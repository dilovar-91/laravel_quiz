<template>
	<div id="app" class="app">
		<div class="quizini">
			<div class="quizini__head">
				<h1 class="quizini__head-title">Санҷиш аз фанни {{nomi_fan}} </h1>
				<h2 class="quizini__head-subtitle">Категорияи {{kat}}</h2>
				<div class="quizini__head-description" v-if="!loading && !start && !result">
					<p>Санҷиши тестӣ  барои санҷидани дараҷаи азхудкунии фанҳои мактабҳои миёна ва литсейҳо тартиб дода шудааст. </p><p>Барои оғози санҷиш тугмаи "Оғоз" - пахш кунед</p>
					<p><em>Ба Шумо муваффақият хоҳонем.</em></p>
				</div>
			</div>
			<div class="quizini__loader" v-if="loader">
				<svg class="quizini__loader-icon" width="120" height="30" viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="#000">
					<circle cx="15" cy="15" r="15">
						<animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite" />
						<animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite" />
					</circle>
					<circle cx="60" cy="15" r="9" fill-opacity="0.3">
						<animate attributeName="r" from="9" to="9" begin="0s" dur="0.8s" values="9;15;9" calcMode="linear" repeatCount="indefinite" />
						<animate attributeName="fill-opacity" from="0.5" to="0.5" begin="0s" dur="0.8s" values=".5;1;.5" calcMode="linear" repeatCount="indefinite" />
					</circle>
					<circle cx="105" cy="15" r="15">
						<animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite" />
						<animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite" />
					</circle>
				</svg>
			</div>
			<div class="quizini__question" v-if="!loader && start && !result">
				<div class="quizini__question-header">
					<span class="quizini__question-counter">{{totalAnswers + 1}}/{{questionAmount}}</span>
					<h3 class="quizini__question-title" v-html="question.id + '.' + question.nomi_savol"></h3>
					<p class="quizini__question-caption" v-if="question.caption" v-html="question.caption"></p>
				</div>
				<div class="quizini__question-form" v-if="question.type == 'checkbox'">
				
					
					<div class="question-form__item" >
						<label class="question-form__item-label form-switch">
							<input class="checkbox" type="checkbox" v-bind:value="1" v-model="pickedAnswer">
							<span class="checkbox__custom"></span>
							<span class="checkbox__text">{{question.varianti_A}}</span>
						</label>
					</div>
					<div class="question-form__item" >
						<label class="question-form__item-label form-switch">
							<input class="checkbox" type="checkbox" v-bind:value="2" v-model="pickedAnswer">
							<span class="checkbox__custom"></span>
							<span class="checkbox__text">{{question.variant_B}}</span>
						</label>
					</div>
					<div class="question-form__item" >
						<label class="question-form__item-label form-switch">
							<input class="checkbox" type="checkbox" v-bind:value="3" v-model="pickedAnswer">
							<span class="checkbox__custom"></span>
							<span class="checkbox__text">{{question.variant_C}}</span>
						</label>
					</div>
					<div class="question-form__item" >
						<label class="question-form__item-label form-switch">
							<input class="checkbox" type="checkbox" v-bind:value="4" v-model="pickedAnswer">
							<span class="checkbox__custom"></span>
							<span class="checkbox__text">{{question.variant_D}}</span>
						</label>
					</div>
				</div>
				<div class="quizini__question-form" v-if="question.type == 'radio'">
					<div class="question-form__item" >
						<label class="question-form__item-label">
							<input class="radio" type="radio" v-bind:value="1" v-model="pickedAnswer">
							<span class="radio__custom"></span>
							<span class="radio__text">{{question.variant_A}}</span>
						</label>
					</div>

					<div class="question-form__item" >
						<label class="question-form__item-label">
							<input class="radio" type="radio" v-bind:value="2" v-model="pickedAnswer">
							<span class="radio__custom"></span>
							<span class="radio__text">{{question.variant_B}}</span>
						</label>
					</div>

					<div class="question-form__item" >
						<label class="question-form__item-label">
							<input class="radio" type="radio" v-bind:value="3" v-model="pickedAnswer">
							<span class="radio__custom"></span>
							<span class="radio__text">{{question.variant_C}}</span>
						</label>
					</div>

					<div class="question-form__item" >
						<label class="question-form__item-label">
							<input class="radio" type="radio" v-bind:value="4" v-model="pickedAnswer">
							<span class="radio__custom"></span>
							<span class="radio__text">{{question.variant_D}}</span>
						</label>
					</div>
				</div>
				
				<div class="quizini__question-form" v-if="question.type == 'input'">
					<div class="form-group">
						<input class="form-input" type="text" v-model="pickedAnswer" placeholder="Answer" />
					</div>
				</div>
				<button class="quizini__btn btn btn--bold btn--center" v-on:click="checkAnswer(question)">Навбатӣ</button>
			</div>
			<div class="quizini__result" v-if="result" id="res">
				{{saveResult}}
				<h3 class="text-center">Натиҷаи шумо: {{correct}}/{{totalAnswers}}</h3>
				<h4 class="text-center">{{resultMessage}}</h4>
			</div>
			
			<div v-if="!start" class="quizini__start">
				
				<button class="quizini__btn btn btn--bold btn--center" v-on:click="load()">Оғоз</button>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: 'questions',
	props: ['id_fan', 'kat', 'nomi_fan'],
	data () {
		return {
			start: false,
			questionAmount: 15,
			loader: false,
			loading: false,
			correct: 0,
			totalAnswers: 0,
			wrongAnswers: false,
			question: null,
			allQuestions: null,
			pickedAnswer: null,
			result: false

		}
	},
	computed: {
		// Show different result message depending on the percentage of correct answers
		resultMessage: function() {
			var resultScore = this.correct / this.totalAnswers
			if (resultScore == 1) {
				return "Аъло!"
			} else if (resultScore >= 0.8) {
				return "Хуб!"
			} else if (resultScore >= 0.5) {
				return "Қаноатбахш"
			} else if (resultScore>= 0.2) {
				return "Ғайриқаноатбахш!"
			} else {
				return "Оё Шумо кушиш намудед?"
			}
		},

		saveResult: function() {
			var resultScore = this.correct / this.totalAnswers
			var Score = 0
			if (resultScore == 1) {
				Score =  100;
			} else if (resultScore >= 0.8) {
				Score =  80;
			} else if (resultScore >= 0.5) {
				Score =  50;
			} else if (resultScore>= 0.2) {
				Score = 20;
			} else {
				Score =  0;
			}
			axios.post('/save_result', {
                       result :  Score,
                       id_fan: this.id_fan,
                       category: this.kat,
                      })
                      .then(function (response) {
                        //alert('Complete! Thanks for your payment!');
                      })
                      .catch(function (error) {
                        //alert(error);
                      });


		}
	},
	methods: {
		// Reset params before start
		load: function() {
			this.start = true
			this.loader = true
			this.result = false
			this.correct = 0
			this.totalAnswers = 0
			self.wrongAnswers = false
			this.loadAllQuestions()
		},
		 /*read() {
		    window.axios.get('/api/questions').then(({ data }) => {
		      // console.log(data)
		    });
		  },*/
		loadAllQuestions: function() {
			self = this
			//$.getJSON("data/data.json",function (data) {
			 window.axios.get('/api/question/'+this.id_fan + '/'+this.kat).then(({ data }) => {
				// Fetching data from the data/data.json file
				// Put all questions inside the data > questions

				self.allQuestions = data
				// Check if the amount of questions exists
				if(self.questionAmount > data.length) {
					alert("Error. There are only " + data.length + " questions in database.")
					// if there is less questions then the amount picked set the questionAmount to the total number of questions
					self.questionAmount = data.length
				}
				// Load question
				self.loadQuestion()
			});
		},
		loadQuestion: function() {
			var self = this
			// Check if there are any more questions to answer
			if(self.totalAnswers + 1 <= self.questionAmount) {
				var pickQ = Math.floor(Math.random()*self.allQuestions.length)
				var question = self.allQuestions[pickQ]

				// Check question type
				if(question.type == 'radio' || question.type == 'input') {
					self.pickedAnswer = null
				} else if (question.type == 'checkbox') {
					self.pickedAnswer = []
				}
				// Remove this question from the total pool of questions so it won't show again
				self.allQuestions.splice(pickQ, 1)
				// Set the vue data question to the question
				self.question = question
				// Turn off loading. This goes quickly so loading almost never shows
				self.loader = false
			} else {
				// if no more questions — show results
				self.result = true

				self.start = false
			}
		},
		checkAnswer: function(question) {
			self = this
			// Check question type
			if(question.type == 'radio' || question.type == 'input') {
				if(question.javob == self.pickedAnswer) {
					self.correct++
					self.wrongAnswers = false
				} else {
					self.wrongAnswers = true
				}
			} else if (question.type == 'checkbox') {
			
				// if checkboxes then transform the objects into array...
				var pickedAnswers = $.makeArray( self.pickedAnswer )
				var correctAnswers = $.makeArray(question.javob)
				//console.log(pickedAnswers);

				// Then sort both arrays so they are comparable
				if(pickedAnswers.sort().join(',') === correctAnswers.sort().join(',')){
					self.correct++
					self.wrongAnswers = false
				} else {
					self.wrongAnswers = true
				}
			}
			self.totalAnswers++
			self.loadQuestion()
		}
	}
}
</script>


<style>


pre {
	background: #f9f9f9;
	border-left: 4px solid #558abb;
	margin-bottom: 1em;
	margin-top: 1em;
	padding: 15px 25px;
	font-style: initial;
}

.app {
	min-width: 320px;
	width: 100%;
	height: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
}

.quizini {
	display: flex;
	width: 650px;
	min-height: 600px;
	background: #fff;
	border: 1px solid #ccc;
	border-radius: 2px;
	padding: 24px;
	flex-direction: column;
}

.quizini__head-title {
	text-align: center;
	font-size: 28px;
	font-weight: bold;
	margin: 0;
}

.quizini__head-subtitle {
	text-align: center;
	font-size: 24px;
	font-weight: 400;
	margin: 0 0 20px 0;
}

.quizini__head-description {
	margin-bottom: 20px;
}

.quizini__loader {
	margin: auto;
}

.quizini__question-header {
	margin-bottom: 15px;
}

.quizini__question-form {
	margin-bottom: 20px;
}

.form-group {
	text-align: center;
	margin-bottom: 20px;
}

.form-select {
	font-size: 20px;
	height: 40px;
	border-radius: 4px;
}

.quizini__question-caption {
	margin-top: 5px;
	font-style: italic;
}

.question-form__item {
	border-top: 1px solid #e6e6e6;
}

.question-form__item:last-child {
	border-bottom: 1px solid #e6e6e6;
}

.question-form__item-label {
	padding: 15px;
	display: block;
}

input[type="text"] {
	border: 1px solid #CCC;
	border-radius: 2px;
	width: 96%;
	font-size: 16px;
	padding: 12px;
}

.btn {
	-moz-appearance: none;
	-webkit-box-shadow: none;
	box-shadow: none;
	border-radius: 2px;
	border-style: solid;
	border-width: 0;
	font-size: 16px;
	cursor: pointer;
	margin: 0;
	text-align: center;
	text-decoration: none;
	background-color: #3f4658;
	color: #000;
	-webkit-transition: background-color .2s ease;
	transition: background-color .2s ease;
	background-color: #eee;
	border: 1px solid #d3d3d3;
}

.btn--center {
	display: block;
	margin: 0 auto;
}

.btn--bold {
	font-weight: bold;
}

.quizini__btn {
	min-width: 100px;
	padding: 12px 50px;
}

.quizini__question-counter {
	display: block;
	margin-bottom: 20px;
	color: #B3B3B3;
	text-align: center;
}

.quizini__result {
	text-align: center;
	width: 275px;
	margin: auto;
	font-size: 28px;
}

.footer {
	margin-top: 10px;
	color: #999;
	text-align: center;
}

.checkbox, .radio {
	display: none;
}

.checkbox__custom,
.radio__custom {
	position: relative;
	width: 20px;
	height: 20px;
	border: 2px solid #429DEF;
	border-radius: 2px;
}

.checkbox__custom,
.checkbox__text,
.radio__custom,
.radio__text {
	display: inline-block;
	vertical-align: middle;
}

.checkbox:checked + .checkbox__custom::before,
.radio:checked + .radio__custom::before {
	content: "";
	display: block;
	position: absolute;
	top: 3px;
	right: 3px;
	bottom: 3px;
	left: 3px;
	background: #429DEF;
}

.radio__custom,
.radio:checked + .radio__custom::before {
	border-radius: 50%;
}

.footer {
	font-size: 14px;
}


</style>