<!-- <link href="./script/quiz.css" rel="stylesheet"> -->
<!-- Quiz Questions -->
    <div id="quizContainer" style="background-color:#A9957B;" class="container  border border-danger rounded">
        <div class="h3 text-white text-center m-2 p-2">Movie Quiz</div>
		<div id="question" style="background-color:#FF836E;" class="p-2 rounded text-white font-weight-bold text-center"></div>
        
         <div class="row justify-content-center">
            <div class="col col-10 col-md-6 col-lg-5">
                <label class="card bg-light flex-row align-items-center m-2 p-2">
                    <input class="mr-2" type="radio" name="option" value="1" /> <span id="opt1"></span>
                </label>
            </div>
            <div class="col col-10 col-md-6 col-lg-5">
                <label class="card bg-light flex-row align-items-center m-2 p-2">
                    <input class="mr-2" type="radio" name="option" value="2" /> <span id="opt2"></span>
                </label>
            </div>
         </div>
         <div class="row justify-content-center">   
            <div class="col col-10 col-md-6 col-lg-5">
                <label class="card bg-light flex-row align-items-center m-2 p-2">
                    <input class="mr-2" type="radio" name="option" value="3" /> <span id="opt3"></span>
                </label>
            </div>
            <div class="col col-10 col-md-6 col-lg-5">
                <label class="card bg-light flex-row align-items-center m-2 p-2">
                    <input class="mr-2" type="radio" name="option" value="4" /> <span id="opt4"></span>
                </label>
            </div>
         </div>
        <div class="row justify-content-center">      
            <button id="nextButton" style="background-color:#FF836E;" class="next-btn m-2 p-2 rounded font-weight-bold text-white" onclick="loadNextQuestion();">Next Question</button>
        </div>      
    </div>
    <div id="result" class="container container bg-light text-center m-2 p-2" style="display:none;"></div>
    <!-- JS -->
    <script src="./script/question.js"></script>
    <script src="./script/quiz-script.js"></script>