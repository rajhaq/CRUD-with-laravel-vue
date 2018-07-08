<template id="item-list">

                <div class="card card-default">
                    <div class="card-header">CRUD demo 1</div>

                    <div class="card-body">
                        <router-link  v-bind:to="{path: '/add'}">
                            <Button type="success" size="large" icon="plus">Add New Item</Button>
                        </router-link>

                        <table id="datatables" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Info</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Info</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <tr :v-for="(item, index) in filteredItems">
                                <td>{{ item.item_title }}</td>
                                <td>{{ item.item_price }}</td>
                                <td>{{ item.item_info }}</td>  
                                <td class="text-center">
                                    <router-link class="btn btn-primary" v-bind:to="{name: 'Itemedit', params: {id: item.id}}">Edit</router-link>
                                    <button class="btn btn-xs btn-danger" type="submit" name="button" @click="deletePost(item.id)" >Delete</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

</template>

<script>
export default {
    data:function(){
        return {
            item: '',
            status:'',
            message:''};
    },
    created: function() {
        let uri = 'http://127.0.0.1:8000/item/';
        Axios.get(uri).then((response) => {
        this.item = response.data;
        });

    },
    methods: {
        deletePost: function(id) {
        let uri = 'http://127.0.0.1:8000/item/'+id;
        let uriAll = 'http://127.0.0.1:8000/item/';
        Axios.delete(uri, this.item).then((response) => {
            this.$router.push({name: 'Itemlist'})
        });
        Axios.get(uriAll).then((response) => {
            this.item = response.data;
        });
        }
    },
    computed: {
        filteredItems: function(){
            if(this.item.length) {
                return this.item;
            }
        }
    }
}
</script>
