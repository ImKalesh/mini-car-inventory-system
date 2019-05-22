<template>

<div>
  <v-card>
    <v-card-title primary-title centered>
      <h4 class="font-weight-thin display-1 text-lg-center">Add new model</h4>
    </v-card-title>
    <v-card-text>
      <v-layout row  justify-center align-center>
        <v-flex xs1 lg4>
                  <v-text-field
                    name="modelName"
                    v-model="selected.modelName"
                    :rules="nameRules"
                    :counter="10"
                    label="Model Name"
                  ></v-text-field>
                </v-flex>
                <v-flex xs1 lg5 md10>
                      <v-form v-model="valid">
                          <v-select
                            :items="manufacturers"
                            item-text="name"
                            item-value="value"
                            v-model="selected.mId"
                            label="Select Manufacturer"
                          ></v-select>
                      </v-form>
                </v-flex>
                
                <v-flex xs1 lg2>
                    <v-btn 
                          color="indigo" 
                          outline 
                          :loading="loader"
                          @click="addModel">Add</v-btn>
                </v-flex>
      </v-layout>
      
    </v-card-text>
  </v-card>
</div>
</template>


<script>
export default {
  data: () =>({
     valid: false,
      nameRules: [
        v => !!v || 'Name is required',
        v => v.length <= 10 || 'Name must be less than 10 characters'
      ],
      selected:{
        mId:'',
        modelName:''
      },
      formReset:{
         mId:'',
        modelName:''
      },
      manufacturers:[],
      loader:false
  }),
  mounted(){
      this.getManufacturers();
  },
  methods:{
    getManufacturers:function(){
        this.$http.get('/api/manufacturers').then(res => {
          let data= (res.body.data).map(res =>({
                                name : res.name,
                                value:res.id
                              })
          )
          this.manufacturers=data;
        }).catch(fails => {
          console.log(fails)
        })
    },
    addModel:function(){
      this.loading(true)
      this.$http.post('api/model',this.selected).then(res => {
        this.loading(false);
        this.selected=Object.assign({},this.formReset)
        this.$toast.show('Car model has been added', 'Hey',{position:'center'});
        
      }).catch(fails => {
        this.loading(false)
        this.$toast.show('Something went wrong', 'Hey',{position:'center'});

        console.log(fails)
      })
    },
    loading:function(status){
        this.loader=status;
    }
  }
}
</script>
