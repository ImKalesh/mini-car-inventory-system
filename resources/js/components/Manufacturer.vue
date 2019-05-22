<template>
    <v-container>
    <v-layout
      text-xs-center
      wrap
      justify-center
      align-center
    >
      <v-flex xs1 lg6>
            <v-card>
              <v-card-title primary-title>
                <h4 class="display-2 font-weight-thin">Add Manufacturer</h4>
              </v-card-title>
              <v-form>
                <v-text-field
                  name="manufacturer"
                  label="Manufacturer Name"
                  :rules="nameRules"
                  v-model="form.manufacturerName"
                ></v-text-field>
                <v-btn
                      outline 
                      color="indigo"
                      :loading="loader"   
                      @click="addManufacturer">Add</v-btn>
              </v-form>
            </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
  export default {
    data: () => ({
      form:{
        manufacturerName:''
      },
      initialform:{
        manufacturerName:''
      },
      nameRules: [
        v => !!v || 'Name is required',
        v => v.length <= 10 || 'Name must be less than 10 characters'
      ],
      loader:false
    }),
    methods:{
      addManufacturer:function(){
        this.loader=true;
          this.$http.post('/api/manufacturer',this.form).then( res => {
            this.loader=false;
            this.$toast.show('Manufacture has been added', 'Hey',{position:'center'});
             this.form=Object.assign({},this.initialform)
          }).catch(fails => {
            this.$toast.show('Something went wrong', 'Hey',{position:'center'});
            this.loader=false;
            console.log(fails)
          });
      }
    }
  }
</script>
