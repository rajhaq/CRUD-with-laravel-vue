<template id="add">
            <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">Add Item</div>

                    <div class="card-body">
                        <Form>
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
                            <textarea class="form-control" rows="4" v-model="item.item_info" ></textarea>
                        </div>
                        <!-- <button type="submit" class="btn btn-success" >
                            <span v-if="!loading2">Click me!</span>
                            <span v-else>Loading...</span>
                        </button> -->
                        <Button type="primary" :loading="loading" @click="createItem">
                            <span v-if="!loading">Click me!</span>
                            <span v-else>Loading...</span>
                        </Button>
                        <router-link v-bind:to="'/'">
                            <Button type="warning" :loading="loading" @click="createItem">
                                Cancel
                            </Button>
                        </router-link>
                        </Form>
                    </div>
                </div>
            </div>
</template>

<script>
export default {
    data() {
    return {
        item: {
            item_title: '', item_price: '', item_info: ''
        },
        loading: false,
    }
    },
    methods: {
        createItem() {
            
            this.loading = true;
            let uri = 'http://127.0.0.1:8000/item';
            Axios.post(uri, this.item).then((response) => {
            this.$router.push({name: 'Itemlist'})
            this.loading = false
            this.success('Item Added')
            
            })
           
        },
        success (message) {
                this.$Notice.success({
                    title: message
                });
            },
        error (message) {
                this.$Notice.error({
                    title: message
                });
            },

    }
 }
</script>