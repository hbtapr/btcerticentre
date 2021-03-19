<template>               
<div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <event-hub></event-hub>
    <side-bar :sidebarLinks="sidebarLinks">
      <mobile-menu slot="content"></mobile-menu>
    </side-bar>

    <div class="main-panel">
      <top-navbar></top-navbar>
      <div class="content pb-5">
        <dashboard-content><h1>Demo Test</h1>
		</br>
		<ol>
		 <form method="get">
             
             <a class="list-group-item" v-for="question in questions">
       <li> <h3>{{question.question}}</h3>
        <div>
                        <input type="radio" name="question1" id="ans1" value="alt_1"/>
                        <label for="question1">A)</label>
                    </div>
   
    
                    <div>
                        <input type="radio" name="question[]" id="alt_2" value="alt_2" />
                        <label for="question1">B)</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question{1]" id="alt_3" value="alt_3" />
                        <label for="question1">C)</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question[1]" id="alt_4" value="alt_4" />
                        <label for="question1">D)</label>
                    </div>	

           </li>
    </a>    
    <div>
    <a class="list-group-item" v-for="alternative in alternatives">
       <li>
       <h3>{{alternative.alt_1}} </h3>
       <h3> </h3>
       <h3></h3>
       <h3></h3>
       </li>
       </a>
         </div>
                 <br>
         <input type="submit" value="Save" formaction="">
          <input type="submit" value="Send" formaction="result">
		</form>
	</ol>
</dashboard-content>
      </div>
    </div>
  </div>

 </template>

<script>
export default {
  data: function(){
       return {
           questions:[],
           alternatives:[],
           alt:null  
       }
   },
   mounted(){
       this.loadQuestions();
       this.loadAlternatives();

   },

   methods:{
       loadQuestions: async function(){
           //load questions
           axios.get('/questions')
           .then((response)=> { 
               this.questions = response.data.data;
           })
           .catch(function(error){
              console.log(error);    
           });
            	console.log(alternatives);
	  for (let i = 0; i < questions.id; i++)
	  {
		let tmp = await(axios.get('/questions/' + this.questions[i].id).then((response) => {this.alt = response}));
	this.alternatives.push([this.questions[i].id, this.questions[i].question, this.alt[0].alt_1]);
	   }
       },
       
       loadAlternatives: async function(){

           axios.get('/alternatives')
           .then((response)=> { 
               this.alternatives = response.data.data;
           })
           .catch( function(error){
              console.log(error);    
           }); 
       }
      
   }  
            
  }
</script>
