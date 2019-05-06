<?php
    session_start();
    if(empty($_SESSION["group_schutle"])){
        $_SESSION["group_schutle"] = 1;
    }else{
        $group = $_SESSION["group_schutle"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/schulte.css">
    <script src="js/vue.min.js"></script>
    <title>Schulte Table</title>
    <style>
        [v-cloak] {
            display: none;
        }
    </style>
</head>
<body>
    <div id="app" class="wrapper w3-container w3-padding-0 w3-margin-0"
         tabindex="-1"
         @mousemove="appendMouseMove($event)"
         @keyup.esc="dialogShowed ? hideDialog() : execDialog('settings')"
         v-focus v-cloak>

        <div v-for="r in gridRange" class="row" :style="{height: rowHeight}">
            <div v-for="c in gridRange" class="cell" :style="{width: colWidth}"
                 @mouseover="hoveredCell = r*gridSize + c"
                 @mouseleave="hoveredCell = -1"
                 @click="setClickedCell(r*gridSize + c, $event)"
                 :class="{'normal-cell' : !showHover && !showClickAnimation,
                          'hovered-cell': showHover && (hoveredCell == r*gridSize + c),
                          'correct-cell': showClickAnimation && (clickedCell == r*gridSize + c) && clickedCell == correctIndex,
                          'wrong-cell'  : showClickAnimation && (clickedCell == r*gridSize + c) && clickedCell != correctIndex,
                          'traced-cell' : showTrace && tracedCell(r*gridSize + c)
                          }">
                <span :class="[cells[r*gridSize + c].cssClasses]"
                      :style="cells[r*gridSize + c].colorStyle"
                      style="cursor: default;">
                    {{ cells[r*gridSize + c].symbol }}
                </span>
            </div>
        </div>

        <div class="center-dot" v-if="showCenterDot"></div>

        <div id="settings-btn" @click="execDialog('settings')"></div>

        <div class="w3-modal"
             :class="[dialogShowed ? 'display-block' : 'display-none']">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="min-width: 350px; max-width: 600px;">
                <header class="w3-container w3-blue w3-center">
                    <span @click="hideDialog"
                          class="w3-button w3-display-topright w3-xxlarge w3-blue w3-hover-blue w3-hover-text-black"
                          style="padding: 0 10px 0 0;"
                          title="Resume Test">
                    &times;
                    </span>
                    <h2>Schulte Table Test</h2>
                </header>

                <div class="w3-bar w3-light-grey w3-border-bottom">
                    <button class="tablink w3-bar-item w3-button"
                            @click="changeDialogTab('settings')"
                            :class="[settingsTabVisible  ? 'w3-indigo w3-text-white w3-hover-indigo' : 'w3-light-grey w3-hover-white']">
                        Settings
                    </button>
                    <button class="tablink w3-bar-item w3-button"
                            @click="changeDialogTab('stats')"
                            :class="[statsTabVisible ? 'w3-indigo w3-text-white w3-hover-indigo' : 'w3-light-grey w3-hover-white']">
                        Stats
                    </button>

                </div>

                <div class="w3-container w3-margin w3-padding-0" v-if="settingsTabVisible">
                    <div class="w3-row">
                        <div class="w3-col w3-half">
                            <label for="grid_size" class="w3-text-black w3-block">
                                <b>Grid</b>
                            </label>
                              <select id="grid_size"
                                    class="w3-select w3-border w3-padding-small"
                                    style="width: 70%"
                                    v-model="gridSize">
                                <option value="5">5 x 5</option>
                            </select>
                        </div>

                        <div class="w3-col w3-half">
                            <label for="groups" class="w3-text-black w3-block">
                                <b>Groups</b>
                            </label>
                            <select id="groups"
                                    class="w3-select w3-border w3-padding-small"
                                    style="width: 70%"
                                    v-model="groupCount">
                                <option value="1">3 group</option>
                            </select>
                        </div>
                    </div>

                    <div class="w3-row" >

                        <div class="w3-col w3-half">
                            <div class="w3-container w3-padding-0" style="margin-top: 10px; width: 90%; float: left;">
                                <div class="color-num"
                                      v-if="groupCount == 1"
                                      v-html="groupRange(0)"></div>
                                <div class="color-num"
                                      :style="groupColorStyles[0]"
                                      v-if="groupCount > 1"
                                      v-html="groupRange(0)"></div>
                                <div class="color-num"
                                      :style="groupColorStyles[1]"
                                      v-if="groupCount > 1"
                                      v-html="groupRange(1)"></div>
                                <div class="color-num"
                                      :style="groupColorStyles[2]"
                                      v-if="groupCount > 2"
                                      v-html="groupRange(2)"></div>
                                <div class="color-num"
                                      :style="groupColorStyles[3]"
                                      v-if="groupCount == 4"
                                      v-html="groupRange(3)"></div>
                            </div>
                        </div>
                    </div>

  

                    <div class="w3-row" >

                        <div class="w3-col w3-quarter" v-if="timerMode">
                            <label for="minutes" class="w3-text">Minutes</label>
                            <select id="minutes"
                                    class="w3-select w3-border w3-padding-small"
                                    style="width: 70%"
                                    v-model="timerMinutes">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="30">30</option>
                            </select>
                        </div>
                    </div>

                    <hr style="margin: 10px 0">

                    <div class="w3-row w3-margin-0">
                        <div class="w3-container w3-col w3-half w3-padding-0" style="min-width: 200px;">
                            <p>
                                <input class="w3-check" type="checkbox" v-model="showHover">
                                <label class="w3-validate">Show Hover</label> </p>
                            <p>
                                <input class="w3-check" type="checkbox" v-model="showTrace">
                                <label class="w3-validate">Show Trace</label> </p>
                            <p>
                                <input class="w3-check" type="checkbox" v-model="showClickResult">
                                <label class="w3-validate">Show Click Result</label> </p>

                        </div>

                    </div>
                </div>

                <div class="w3-container w3-margin" v-if="statsTabVisible">
                    <table class="w3-table-all w3-large">
                        <tr>
                            <td>Time</td>
                            <td>{{ stats.timeDiff() }}</td>
                        </tr>
                        <tr class="w3-pale-green">
                            <td>Correct Clicks</td>
                            <td>{{ stats.correctClicks }}</td>
                        </tr>
                        <tr class="w3-pale-red">
                            <td>Wrong Clicks</td>
                            <td>{{ stats.wrongClicks }}</td>
                        </tr>
                    </table>
                    <div class="w3-row w3-col"
                         style="margin-top: 5px; overflow-y:scroll; overflow-x:hidden; max-height:250px;"
                         v-if="stats.clicks.length > 0">
                        <table class="w3-table-all w3-hoverable w3-centered">
                            <thead>
                            <tr class="w3-light-grey">
                                <th>Group</th>
                                <th>Number</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tr v-for="stat in stats.clicks" :class="{'w3-text-red': stat.err}">
                                <td>{{stat.groupN + 1}}</td>
                                <td>{{stat.number}}</td>
                                <td>{{stat.time}}</td>
                            </tr>
                        </table>
                    </div>
                </div>



                <footer class="w3-container w3-light-grey w3-center" v-if="settingsTabVisible">
                    <button type="button"
                            class="w3-btn w3-indigo w3-text-white w3-xlarge"
                            style="width: 80%; margin: 10px;"
                            @click="hideDialog(); startGame()"
                            ref="btn">
                        Start Test
                    </button>
                </footer>

                <footer class="w3-container w3-light-grey w3-center" v-if="statsTabVisible">
                    <button type="button"
                            class="w3-btn w3-indigo w3-text-white w3-xlarge"
                            style="width: 80%; margin: 10px;"
                            @click="endGame()"
                            ref="btn">
                        End Test
                    </button>
                </footer>

            </div>
        </div>
    </div>

    <script src="js/schulte.js"></script>
    <script src="../js/jquery-1.10.2.min.js" type="text/javascript"></script>

</body>
</html>