<template id="add">
            <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">Add Item</div>

                    <div class="card-body">
                        <form v-on:submit.prevent="createItem">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" v-model="item.item_title" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input id="price"  type="number"  v-model="item.item_price" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="info">Info</label>
                            <textarea class="form-control" rows="4" v-model="item.item_info"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Create Item</button>
                        <router-link class="btn btn-danger" v-bind:to="'/'">Cancel</router-link>
                        </form>
                    </div>
                </div>
            </div>
</template>

<script>
 export default {
   data: function () {
 return {item: {item_title: '', item_price: '', item_info: ''}}
 },
 methods: {
   createItem: function() {
     let uri = 'http://127.0.0.1:8000/item';
     Axios.post(uri, this.item).then((response) => {
     this.$router.push({name: 'Itemlist'})
     })
   }
 }
 }
</script>