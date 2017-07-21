//IP PLC Tempra : 192.168.???.???
var snap7 = require('node-snap7');
var mysql = require('mysql');
var io = require('socket.io')();


var s7client = new snap7.S7Client();
var tmrw;

var osql = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "bma_protrack_tempra"
});

//================ INFO

var stopHomo = 0, stopScrapper = 0, stopAgitattor = 0, stopVacuum = 0, stopVent = 0;
var stopHeat = 0, stopCool = 0, stopDrain = 0, stopInletb18 = 0, stopInletsl19 = 0;
var stopInletb20 = 0, stopInletb21 = 0, stopCIP = 0;
var statusRun = 0;


//==================================KICKSTART===========================================//
(function () {
    osql.query("SELECT opkey,opvalue FROM plc ORDER BY opkey", function (err, rows) {
        if (err)
            throw err;
        var dataDB = {};
        for (var i = 0; i < rows.length; i++) {
            dataDB[rows[i].opkey] = rows[i].opvalue;
        }
        console.log('---- SERVER RUNNING ----');
        io.on('connection', function (socket) {
//            console.log(parseFloat('0x42f7147b')); // 123.54 Decimal
//            console.log(parseFloat('0x00000226')); // 550 Decimal
//            console.log(parseFloat('0x44098000')); // 550.00 Decimal
//            console.log(parseFloat('0x43b18000')); // 355 Decimal
//            mainProcess(dataDB, socket);
            tmrw = setInterval(function () {
                io.emit('alarmINFO', {"info": 'on'});
            }, 5000)

        });
        io.listen(3001);
    });
})();

//---- (Main Process)
var mainProcess = function (dataDB, socket) {
    var con = s7client.ConnectTo(dataDB.ip_plc, 0, 2);
    if (con == true) {
        function cekPLC() {
            tmrw = setInterval(function () {
                var con = s7client.ConnectTo(dataDB.ip_plc, 0, 2);
                if (con == false) {
                    socket.emit('plcINFO', {"info": 'off'});
                } else {
                    socket.emit('plcINFO', {"info": 'on'});
                    // Get Data --------------------------------------------------- >>>
                    var val = s7client.DBRead(dataDB.db_plc * 1, dataDB.TEMPERATURE * 1, 194); // Long : 24 BYTE
                    if (val == false) {
                        console.log('Get Data : ' + s7client.LastError());
                    } else {
                        if (val != null) {
                            var hexa = val.toString('hex');
//                            console.log(parseFloat('0x' + hexa.substr(8, 8)));
                            var TEMPERATURE = parseFloat('0x' + hexa.substr(0, 8));
                            var WEIGHT = parseFloat('0x' + hexa.substr(8, 8));
                            var PRESSURE = parseFloat('0x' + hexa.substr(16, 8));
                            var SPEED_HOMO = parseFloat('0x' + hexa.substr(24, 8));
                            var SPEED_AGITATOR = parseFloat('0x' + hexa.substr(32, 8));
                            var SPEED_SCRAPPER = parseFloat('0x' + hexa.substr(40, 8));
//                            console.log(TEMPERATURE + "," + WEIGHT + "," + PRESSURE + "," + SPEED_HOMO + "," + SPEED_AGITATOR + "," + SPEED_SCRAPPER);
                            osql.query("INSERT INTO record_continue (temperature,weight,pressure,speed_homo,speed_agitator,speed_scrapper) VALUES (" + TEMPERATURE + "," + WEIGHT + "," + PRESSURE + "," + SPEED_HOMO + "," + SPEED_AGITATOR + "," + SPEED_SCRAPPER + ")", function (err, rows) {
                                if (err)
                                    throw err;
                            });
                            //-------------------------------------------------- 1
                            var HOMO_RUNNING = parseInt(hexa.substr(48, 2), 16);
                            var HOMO_ACK_RUNNING = parseInt(hexa.substr(50, 2), 16);
                            var HOMO_STOP = parseInt(hexa.substr(52, 2), 16);
                            var HOMO_ACK_STOP = parseInt(hexa.substr(54, 2), 16);
                            var HOMO_SETPOINT = parseFloat('0x' + hexa.substr(56, 8));
                            var HOMO_ACTUAL = parseFloat('0x' + hexa.substr(64, 8));
                            if (HOMO_RUNNING == 1) {
                                osql.query("INSERT INTO record_homogenizer (setpoint,actual,flag) VALUES (" + HOMO_SETPOINT + "," + HOMO_ACTUAL + ",'1')", function (err, rows) {
                                    if (err)
                                        throw err;
                                });
                                stopHomo = 0;
                                statusRun = 1;
                            } else {
                                if (stopHomo == 0) {
                                    osql.query("INSERT INTO record_homogenizer (flag) VALUES ('0')", function (err, rows) {
                                        if (err)
                                            throw err;
                                    });
                                    stopHomo = 1;
                                }
                            }
//                            console.log(HOMO_RUNNING + " " + HOMO_ACK_RUNNING + " "+ HOMO_STOP + " " + HOMO_ACK_STOP + " " + HOMO_SETPOINT + " " + HOMO_ACTUAL);
                            //-------------------------------------------------- 2
                            var SCRAPPER_RUNNING = parseInt(hexa.substr(72, 2), 16);
                            var SCRAPPER_ACK_RUNNING = parseInt(hexa.substr(74, 2), 16);
                            var SCRAPPER_STOP = parseInt(hexa.substr(76, 2), 16);
                            var SCRAPPER_ACK_STOP = parseInt(hexa.substr(78, 2), 16);
                            var SCRAPPER_SETPOINT = parseFloat('0x' + hexa.substr(80, 8));
                            var SCRAPPER_ACTUAL = parseFloat('0x' + hexa.substr(88, 8));
                            if (SCRAPPER_RUNNING == 1) {
                                osql.query("INSERT INTO record_scrapper (setpoint,actual,flag) VALUES (" + SCRAPPER_SETPOINT + "," + SCRAPPER_ACTUAL + ",'1')", function (err, rows) {
                                    if (err)
                                        throw err;
                                });
                                stopScrapper = 0;
                                statusRun = 1;
                            } else {
                                if (stopScrapper == 0) {
                                    osql.query("INSERT INTO record_scrapper (flag) VALUES ('0')", function (err, rows) {
                                        if (err)
                                            throw err;
                                    });
                                    stopScrapper = 1;
                                }
                            }
                            //-------------------------------------------------- 3
                            var AGITATOR_RUNNING = parseInt(hexa.substr(96, 2), 16);
                            var AGITATOR_ACK_RUNNING = parseInt(hexa.substr(98, 2), 16);
                            var AGITATOR_STOP = parseInt(hexa.substr(100, 2), 16);
                            var AGITATOR_ACK_STOP = parseInt(hexa.substr(102, 2), 16);
                            var AGITATOR_SETPOINT = parseFloat('0x' + hexa.substr(104, 8));
                            var AGITATOR_ACTUAL = parseFloat('0x' + hexa.substr(112, 8));
                            if (AGITATOR_RUNNING == 1) {
                                osql.query("INSERT INTO record_agitator (setpoint,actual,flag) VALUES (" + AGITATOR_SETPOINT + "," + AGITATOR_ACTUAL + ",'1')", function (err, rows) {
                                    if (err)
                                        throw err;
                                });
                                stopAgitattor = 0;
                                statusRun = 1;
                            } else {
                                if (stopAgitattor == 0) {
                                    osql.query("INSERT INTO record_agitator (flag) VALUES ('0')", function (err, rows) {
                                        if (err)
                                            throw err;
                                    });
                                    stopAgitattor = 1;
                                }
                            }
                            //-------------------------------------------------- 4
                            var VACUUM_RUNNING = parseInt(hexa.substr(120, 2), 16);
                            var VACUUM_ACK_RUNNING = parseInt(hexa.substr(122, 2), 16);
                            var VACUUM_STOP = parseInt(hexa.substr(124, 2), 16);
                            var VACUUM_ACK_STOP = parseInt(hexa.substr(126, 2), 16);
                            var VACUUM_SETPOINT = parseFloat('0x' + hexa.substr(128, 8));
                            var VACUUM_ACTUAL = parseFloat('0x' + hexa.substr(136, 8));
                            if (VACUUM_RUNNING == 1) {
                                osql.query("INSERT INTO record_vacuum (setpoint,actual,flag) VALUES (" + VACUUM_SETPOINT + "," + VACUUM_ACTUAL + ",'1')", function (err, rows) {
                                    if (err)
                                        throw err;
                                });
                                stopVacuum = 0;
                                statusRun = 1;
                            } else {
                                if (stopVacuum == 0) {
                                    osql.query("INSERT INTO record_vacuum (flag) VALUES ('0')", function (err, rows) {
                                        if (err)
                                            throw err;
                                    });
                                    stopVacuum = 1;
                                }
                            }
                            //-------------------------------------------------- 5
                            var VENT_RUNNING = parseInt(hexa.substr(144, 2), 16);
                            var VENT_ACK_RUNNING = parseInt(hexa.substr(146, 2), 16);
                            var VENT_STOP = parseInt(hexa.substr(148, 2), 16);
                            var VENT_ACK_STOP = parseInt(hexa.substr(150, 2), 16);
                            var VENT_SETPOINT = parseFloat('0x' + hexa.substr(152, 8));
                            var VENT_ACTUAL = parseFloat('0x' + hexa.substr(160, 8));
                            if (VENT_RUNNING == 1) {
                                osql.query("INSERT INTO record_vent (setpoint,actual,flag) VALUES (" + VENT_SETPOINT + "," + VENT_ACTUAL + ",'1')", function (err, rows) {
                                    if (err)
                                        throw err;
                                });
                                stopVent = 0;
                                statusRun = 1;
                            } else {
                                if (stopVent == 0) {
                                    osql.query("INSERT INTO record_vent (flag) VALUES ('0')", function (err, rows) {
                                        if (err)
                                            throw err;
                                    });
                                    stopVent = 1;
                                }
                            }
                            //-------------------------------------------------- 6
                            var HEAT_RUNNING = parseInt(hexa.substr(168, 2), 16);
                            var HEAT_ACK_RUNNING = parseInt(hexa.substr(170, 2), 16);
                            var HEAT_STOP = parseInt(hexa.substr(172, 2), 16);
                            var HEAT_ACK_STOP = parseInt(hexa.substr(174, 2), 16);
                            var HEAT_SETPOINT = parseFloat('0x' + hexa.substr(176, 8));
                            var HEAT_ACTUAL = parseFloat('0x' + hexa.substr(184, 8));
                            if (HEAT_RUNNING == 1) {
                                osql.query("INSERT INTO record_heat (setpoint,actual,flag) VALUES (" + HEAT_SETPOINT + "," + HEAT_ACTUAL + ",'1')", function (err, rows) {
                                    if (err)
                                        throw err;
                                });
                                stopHeat = 0;
                                statusRun = 1;
                            } else {
                                if (stopHeat == 0) {
                                    osql.query("INSERT INTO record_heat (flag) VALUES ('0')", function (err, rows) {
                                        if (err)
                                            throw err;
                                    });
                                    stopHeat = 1;
                                }
                            }
                            //-------------------------------------------------- 7
                            var COOL_RUNNING = parseInt(hexa.substr(192, 2), 16);
                            var COOL_ACK_RUNNING = parseInt(hexa.substr(194, 2), 16);
                            var COOL_STOP = parseInt(hexa.substr(196, 2), 16);
                            var COOL_ACK_STOP = parseInt(hexa.substr(198, 2), 16);
                            var COOL_SETPOINT = parseFloat('0x' + hexa.substr(200, 8));
                            var COOL_ACTUAL = parseFloat('0x' + hexa.substr(208, 8));
                            if (COOL_RUNNING == 1) {
                                osql.query("INSERT INTO record_cool (setpoint,actual,flag) VALUES (" + COOL_SETPOINT + "," + COOL_ACTUAL + ",'1')", function (err, rows) {
                                    if (err)
                                        throw err;
                                });
                                stopCool = 0;
                                statusRun = 1;
                            } else {
                                if (stopCool == 0) {
                                    osql.query("INSERT INTO record_cool (flag) VALUES ('0')", function (err, rows) {
                                        if (err)
                                            throw err;
                                    });
                                    stopCool = 1;
                                }
                            }
                            //-------------------------------------------------- 8
                            var DRAIN_RUNNING = parseInt(hexa.substr(216, 2), 16);
                            var DRAIN_ACK_RUNNING = parseInt(hexa.substr(218, 2), 16);
                            var DRAIN_STOP = parseInt(hexa.substr(220, 2), 16);
                            var DRAIN_ACK_STOP = parseInt(hexa.substr(222, 2), 16);
                            var DRAIN_SETPOINT = parseFloat('0x' + hexa.substr(224, 8));
                            var DRAIN_ACTUAL = parseFloat('0x' + hexa.substr(232, 8));
                            if (DRAIN_RUNNING == 1) {
                                osql.query("INSERT INTO record_drain (setpoint,actual,flag) VALUES (" + DRAIN_SETPOINT + "," + DRAIN_ACTUAL + ",'1')", function (err, rows) {
                                    if (err)
                                        throw err;
                                });
                                stopDrain = 0;
                                statusRun = 1;
                            } else {
                                if (stopDrain == 0) {
                                    osql.query("INSERT INTO record_drain (flag) VALUES ('0')", function (err, rows) {
                                        if (err)
                                            throw err;
                                    });
                                    stopDrain = 1;
                                }
                            }
                            //-------------------------------------------------- 9
                            var INLETB18_RUNNING = parseInt(hexa.substr(240, 2), 16);
                            var INLETB18_ACK_RUNNING = parseInt(hexa.substr(242, 2), 16);
                            var INLETB18_STOP = parseInt(hexa.substr(244, 2), 16);
                            var INLETB18_ACK_STOP = parseInt(hexa.substr(246, 2), 16);
                            var INLETB18_SETPOINT = parseFloat('0x' + hexa.substr(248, 8));
                            var INLETB18_ACTUAL = parseFloat('0x' + hexa.substr(256, 8));
                            if (INLETB18_RUNNING == 1) {
                                osql.query("INSERT INTO record_inletb18 (setpoint,actual,flag) VALUES (" + INLETB18_SETPOINT + "," + INLETB18_ACTUAL + ",'1')", function (err, rows) {
                                    if (err)
                                        throw err;
                                });
                                stopInletb18 = 0;
                                statusRun = 1;
                            } else {
                                if (stopInletb18 == 0) {
                                    osql.query("INSERT INTO record_inletb18 (flag) VALUES ('0')", function (err, rows) {
                                        if (err)
                                            throw err;
                                    });
                                    stopInletb18 = 1;
                                }
                            }
                            //-------------------------------------------------- 10
                            var INLETSL19_RUNNING = parseInt(hexa.substr(264, 2), 16);
                            var INLETSL19_ACK_RUNNING = parseInt(hexa.substr(266, 2), 16);
                            var INLETSL19_STOP = parseInt(hexa.substr(268, 2), 16);
                            var INLETSL19_ACK_STOP = parseInt(hexa.substr(270, 2), 16);
                            var INLETSL19_SETPOINT = parseFloat('0x' + hexa.substr(272, 8));
                            var INLETSL19_ACTUAL = parseFloat('0x' + hexa.substr(280, 8));
                            if (INLETSL19_RUNNING == 1) {
                                osql.query("INSERT INTO record_inletsl19 (setpoint,actual,flag) VALUES (" + INLETSL19_SETPOINT + "," + INLETSL19_ACTUAL + ",'1')", function (err, rows) {
                                    if (err)
                                        throw err;
                                });
                                stopInletsl19 = 0;
                                statusRun = 1;
                            } else {
                                if (stopInletsl19 == 0) {
                                    osql.query("INSERT INTO record_inletsl19 (flag) VALUES ('0')", function (err, rows) {
                                        if (err)
                                            throw err;
                                    });
                                    stopInletsl19 = 1;
                                }
                            }
                            //-------------------------------------------------- 11
                            var INLETB20_RUNNING = parseInt(hexa.substr(288, 2), 16);
                            var INLETB20_ACK_RUNNING = parseInt(hexa.substr(290, 2), 16);
                            var INLETB20_STOP = parseInt(hexa.substr(292, 2), 16);
                            var INLETB20_ACK_STOP = parseInt(hexa.substr(294, 2), 16);
                            var INLETB20_SETPOINT = parseFloat('0x' + hexa.substr(296, 8));
                            var INLETB20_ACTUAL = parseFloat('0x' + hexa.substr(304, 8));
                            if (INLETB20_RUNNING == 1) {
                                osql.query("INSERT INTO record_inletb20 (setpoint,actual,flag) VALUES (" + INLETB20_SETPOINT + "," + INLETB20_ACTUAL + ",'1')", function (err, rows) {
                                    if (err)
                                        throw err;
                                });
                                stopInletb20 = 0;
                                statusRun = 1;
                            } else {
                                if (stopInletb20 == 0) {
                                    osql.query("INSERT INTO record_inletb20 (flag) VALUES ('0')", function (err, rows) {
                                        if (err)
                                            throw err;
                                    });
                                    stopInletb20 = 1;
                                }
                            }
                            //-------------------------------------------------- 12
                            var INLETB21_RUNNING = parseInt(hexa.substr(312, 2), 16);
                            var INLETB21_ACK_RUNNING = parseInt(hexa.substr(314, 2), 16);
                            var INLETB21_STOP = parseInt(hexa.substr(316, 2), 16);
                            var INLETB21_ACK_STOP = parseInt(hexa.substr(318, 2), 16);
                            var INLETB21_SETPOINT = parseFloat('0x' + hexa.substr(320, 8));
                            var INLETB21_ACTUAL = parseFloat('0x' + hexa.substr(328, 8));
                            if (INLETB21_RUNNING == 1) {
                                osql.query("INSERT INTO record_inletb21 (setpoint,actual,flag) VALUES (" + INLETB21_SETPOINT + "," + INLETB21_ACTUAL + ",'1')", function (err, rows) {
                                    if (err)
                                        throw err;
                                });
                                stopInletb21 = 0;
                                statusRun = 1;
                            } else {
                                if (stopInletb21 == 0) {
                                    osql.query("INSERT INTO record_inletb21 (flag) VALUES ('0')", function (err, rows) {
                                        if (err)
                                            throw err;
                                    });
                                    stopInletb21 = 1;
                                }
                            }
                            //-------------------------------------------------- 13
                            var CIP_RUNNING = parseInt(hexa.substr(336, 2), 16);
                            var CIP_ACK_RUNNING = parseInt(hexa.substr(338, 2), 16);
                            var CIP_STOP = parseInt(hexa.substr(340, 2), 16);
                            var CIP_ACK_STOP = parseInt(hexa.substr(342, 2), 16);
                            var CIP_SETPOINT = parseFloat('0x' + hexa.substr(344, 8));
                            var CIP_ACTUAL = parseFloat('0x' + hexa.substr(352, 8));
                            //--------------------------------------------------
                            var CIP_MODE = parseInt(hexa.substr(360, 2), 16);
                            var CIP_Fill_CYCLE = parseFloat('0x' + hexa.substr(362, 8));
                            var CIP_Circ_CYCLE = parseFloat('0x' + hexa.substr(370, 8));
                            var CIP_Speed_CYCLE = parseFloat('0x' + hexa.substr(378, 8));
                            if (CIP_RUNNING == 1) {
                                osql.query("INSERT INTO record_cip (setpoint,actual,cip_mode,cip_fill_cycle,cip_circ_cycle,cip_speed_cycle,flag) VALUES (" + CIP_SETPOINT + "," + CIP_ACTUAL + "," + CIP_MODE + "," + CIP_Fill_CYCLE + "," + CIP_Circ_CYCLE + "," + CIP_Speed_CYCLE + ")", function (err, rows) {
                                    if (err)
                                        throw err;
                                });
                                stopCIP = 0;
                                statusRun = 1;
                            } else {
                                if (stopCIP == 0) {
                                    osql.query("INSERT INTO record_cip (flag) VALUES ('0')", function (err, rows) {
                                        if (err)
                                            throw err;
                                    });
                                    stopCIP = 1;
                                }
                            }
                            //--------------------------------------------------
                        }
                    }
                    if (statusRun == 1) {
                        socket.emit('statusMachine', {"info": 'on'});
                    } else {
                        socket.emit('statusMachine', {"info": 'off'});
                    }
                    statusRun = 0;
                }
            }, 1000);
        }
        cekPLC();
    } else {
        console.log('Cant connect :' + s7client.ErrorText(s7client.LastError()));
        mainProcess(dataDB, socket);
    }
};

//---- Hex to Float Function
function parseFloat(str) {
    var float = 0, sign, order, mantiss, exp,
            int, checkexp = 0, multi = 1;
    if (/^0x/.exec(str)) {
        int = parseInt(str, 16);
    } else {
        for (var i = str.length - 1; i >= 0; i -= 1) {
            if (str.charCodeAt(i) > 255) {
                console.log('Wrong string parametr');
                return false;
            }
            int += str.charCodeAt(i) * multi;
            multi *= 256;
        }
    }
    sign = (int >>> 31) ? -1 : 1;
    exp = (int >>> 23 & 0xff) - 127;
    checkexp = exp;
    mantissa = ((int & 0x7fffff) + 0x800000).toString(2);
    for (i = 0; i < mantissa.length; i += 1) {
        float += parseInt(mantissa[i]) ? Math.pow(2, exp) : 0;
        exp--;
    }
    if (checkexp < 0) {
        return int;
    } else {
        return (float * sign).toFixed(2);
    }
}

function getDateTime() {
    var date = new Date();
    var hour = date.getHours();
    hour = (hour < 10 ? "0" : "") + hour;
    var min = date.getMinutes();
    min = (min < 10 ? "0" : "") + min;
    var sec = date.getSeconds();
    sec = (sec < 10 ? "0" : "") + sec;
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    month = (month < 10 ? "0" : "") + month;
    var day = date.getDate();
    day = (day < 10 ? "0" : "") + day;
    return year + "-" + month + "-" + day + " " + hour + ":" + min + ":" + sec;
}

