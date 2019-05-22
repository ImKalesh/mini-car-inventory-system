<template>
    <div>
        <v-card>
            <v-card-title primary-title centered>
                <h3 class="font-weight-thin display-3">Inventory</h3>
            </v-card-title>
            <v-card-text>
                    <v-layout row justify-center="">
                    <v-flex xs1 lg8>
                                <v-data-table
                                    :headers="headers"
                                    :items="items"
                                    class="elevation-1"
                                >
                                <template v-slot:items="props">
                                        <td>{{ props.item.s_no }}</td>
                                        <td class="text-xs-left">{{ props.item.manufacturer }}</td>
                                        <td class="text-xs-left">{{ props.item.model }}</td>
                                        <td class="text-xs-left">{{ props.item.count }}</td>
                                        <td class="justify-center layout px-0">
                                         <v-btn color="indigo" outline="" @click="sold(props.item)">Sold</v-btn>   
                                        </td>
                                </template>
                                </v-data-table>
                    </v-flex> 
                    </v-layout>
            </v-card-text>
        </v-card>
    </div>
</template>

<script>
export default {
    data:() =>({
        headers: [
        {
          text: 'S.No',
          align: 'left',
          sortable: false,
          value: 's_no'
        },
        { text: 'Manufacturer', value: 'manufacturer' },
        { text: 'Model', value: 'model' },
        { text: 'Count', value: 'count' },
        { text: 'Actions', value: 'name', sortable: false }
      ],
      items:[]
    }),
    mounted(){
        this.inventory();
    },
    methods:{
        inventory:function(){
                this.$http.get('api/inventory').then(res => {
                let data= (res.body).map(res => ({
                        s_no:res.id,
                        manufacturer:res.manufacturer.name,
                        model:res.name,
                        count:res.count,
                        mId:res.manufacturer.id
                    }))
                    this.items=data;
                }).catch( fails => {
                    console.log(fails)
                });
        },
        sold:function(item){
            console.log(item)
            this.$http.post('api/inventory/sold',item).then(res => {
                        this.inventory();
                this.$toast.show('Inventory has been updated', 'Hey',{position:'center'});

                }).catch( fails => {
                this.$toast.show('Something went wrong', 'Hey',{position:'center'});

                    console.log(fails)
                });
        }
    }
}
</script>

