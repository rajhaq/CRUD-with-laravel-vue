<template id="edit">
  	<div class="col-md-10">
		<div class="card card-default">
			<div class="card-header">Add Item</div>

			<div class="card-body">
				<form v-on:submit.prevent = "editItem">
					<div class="form-group">
						<label for="title">Title</label>
						<input id="title" v-model="post.item_title" class="form-control" required />
					</div>
					<div class="form-group">
						<label for="price">Price</label>
						<input id="price" type="number" v-model="post.item_price" class="form-control" required />
					</div>
					<div class="form-group">
						<label for="info">Info</label>
						<textarea class="form-control" rows="4" v-model="post.item_info"></textarea>
					</div>
					<button type="submit" class="btn btn-xs btn-primary">Update Post</button>
					<router-link class="btn btn-xs btn-warning" v-bind:to="'/'">Cancel</router-link>
				</form>
			</div>
		</div>
	</div>
</template>

<script>
export default{
  	data: function () {
	return {post: {item_title: '', item_price: '', item_info: ''}}
  	},
  	created: function(){
    	let uri = 'http://127.0.0.1:8000/item/'+this.$route.params.id+'/edit';
    	Axios.get(uri).then((response) => {
    		this.post = response.data;
		});
  	},
  	methods: {
		editItem: function() {
			let uri = 'http://127.0.0.1:8000/item/'+this.$route.params.id;
			Axios.patch(uri, this.post).then((response) => {
				this.$router.push({name: 'Itemlist'})
			})
		}
	}
}
</script>