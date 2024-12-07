var cmdoffsetsread = new function () {

    var ws = null; // WebSocket

    this.start = function() {
        this.openConnection();
        this.sendReadRequest();
    };

    this.stop = function () {
        if (ws) {
            ws.close();
        }
    };

    var clearMessages = function () {
        document.getElementById("connectionStatus").innerText = ws ? "Connection Open" : "Connection Closed";
        document.getElementById("errorMessage").innerText = "";
        document.getElementById("successMessage").innerText = "";
    };

    this.openConnection = function () {
        if (!ws) {

            clearMessages();

            // Create a new WebSocket. 
            // The server url is from the text box on the form
            var serverURL = document.getElementById("serverURL").value;
            ws = new WebSocket(serverURL, "fsuipc");

            // Handle the onopen event
            ws.onopen = function () {
                document.getElementById("connectionStatus").innerText = "Connection Open";
            };

            // Handle the onclose event
            ws.onclose = function () {
                document.getElementById("connectionStatus").innerText = "Connection Closed";
                // clear the WebSocket so we can try again
                ws = null;
            };

            // Handle the onerror event
            ws.onerror = function () {
                document.getElementById("errorMessage").innerText = "WebSocket Error";
            };

            // Handle incomming messages
            ws.onmessage = function (msg) {
                // parse the JSON string to a Javascript object
                var response = JSON.parse(msg.data);

                // If the response indicated success then we can proceed to process it 
                if (response.success) {
                    // handle the response according to the command. 
                    switch (response.command) {
                        case 'offsets.declare':
                            document.getElementById('successMessage').innerText = 'Offsets "' + response.name + '" have been declared';
                            break;
                        case "offsets.stop":
                            document.getElementById('successMessage').innerText = 'Updates for "' + response.name + '" have been stopped';
                            break;
                        case 'offsets.read':
                            switch (response.name) {
                                case 'myOffsets':
                                    showOffsetValues(response);
                                    break;
                            }
                            break;
                        default:
                            // Unhandled command
                            document.getElementById('errorMessage').innerText = 'Unknown command: ' + response.command;
                            break;
                    }
                }
                else {
                    // The request failed. Handle the errors here.
                    // In this example we just display errors to the webpage
                    var error = 'Error for ' + response.name + ' (' + response.command + '): ';
                    error += response.errorCode + " - " + response.errorMessage;
                    document.getElementById("errorMessage").innerText = error;
                }
            };
        }
    }

    var showOffsetValues = function (response) {
        // Aircraft name
        document.getElementById("aircraft").innerText = response.data.aircraftName;
        // avionics master switch
        document.getElementById("avionics").innerText = response.data.avionicsMaster > 0 ? 'ON' : 'OFF';
        // heading
        var headingDegrees = response.data.heading * 360 / (65536 * 65536);
        document.getElementById("heading").innerText = headingDegrees.toFixed(0);
        // altitude
        var altitudeFeet = response.data.altitude / (65535 * 65535) * 3.28084;
        document.getElementById("altitude").innerText = altitudeFeet.toFixed(0);
    }

    this.sendDeclareRequest = function () {

        clearMessages();
        // create the request object
        var request = {
            command: 'offsets.declare',
            name: 'myOffsets',
            offsets: [
                { name: 'altitude', address: 0x0570, type: 'int', size: 8 },
                { name: 'avionicsMaster', address: 0x2E80, type: 'uint', size: 4 },
                { name: 'heading', address: 0x0580, type: 'uint', size: 4 },
                { name: 'aircraftName', address: 0x3D00, type: 'string', size: 256 },
            ]
        }

        // send to the server as a JSON string
        if (ws) {
            ws.send(JSON.stringify(request));
        }

    }

    this.sendReadRequest = function () {

        clearMessages();
        var regularUpdates = document.getElementById('chkUseInterval').checked ? 100 : 0; 
        // create the read request object
        var request = {
            command: 'offsets.read',
            name: 'myOffsets',
            interval: regularUpdates // Receive regular updates every 100ms if the checkbox is ticked
        }

        // send to the server as a JSON string
        if (ws) {
            ws.send(JSON.stringify(request));
        }

    }

    this.sendStopRequest = function () {

        clearMessages();
        // create the stop request object
        var request = {
            command: 'offsets.stop',
            name: 'myOffsets'
        }

        // send to the server as a JSON string
        if (ws) {
            ws.send(JSON.stringify(request));
        }

    }

    this.closeConnection = function () {
        if (ws) {

            clearMessages();

            ws.close();
            
        }
    }

};

// 自动打开连接
cmdoffsetsread.openConnection();

// 自动发送读取请求
cmdoffsetsread.sendReadRequest();