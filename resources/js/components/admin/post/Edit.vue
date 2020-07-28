<template>
  <!-- Col 12 -->
  <div class="col-8 mt-4 mx-auto">
    <h4 class="text-center">Update Post</h4>
    <div class="card rounded-lg">
      <div class="card-body">
        <form action="#" @submit.prevent="updatePost" enctype="multipart/form-data">
          <!-- title -->
          <div class="input-group mt-3">
            <input
              class="form-control bg-light"
              type="text"
              name="title"
              id="title"
              v-model="form.title"
              placeholder="Enter your title"
              :class="{ 'is-invalid': form.errors.has('title') }"
            />
            <has-error :form="form" field="title"></has-error>
          </div>
          <label for="title">Title</label>
          <!-- category -->
          <div class="input-group mt-3">
            <select
              class="form-control bg-light"
              name="category_id"
              id="category"
              v-model="form.category_id"
              :class="{ 'is-invalid': form.errors.has('title') }"
            >
              <option disabled value>Select One..</option>
              <option
                v-for="category in getCategory"
                :value="category.id"
                :key="category.id"
              >{{category.cat_name}}</option>
            </select>
            <has-error :form="form" field="category_id"></has-error>
          </div>
          <label for="category_id">Category</label>
          <!-- body -->
          <div class="input-group mt-3">
            <textarea
              class="form-control bg-light"
              name="body"
              id="body"
              v-model="form.body"
              :class="{ 'is-invalid': form.errors.has('title') }"
            ></textarea>
            <has-error :form="form" field="body"></has-error>
          </div>
          <label for="body">Description</label>
          <!-- title -->
          <div class="input-group mt-3">
            <input
              class="form-control bg-light"
              type="file"
              name="image"
              id="image"
              :class="{ 'is-invalid': form.errors.has('image') }"
              @change="changePhoto($event)"
            />
            <has-error :form="form" field="image"></has-error>
          </div>
          <label for="image">Photo</label>
          <img :src="photoLink()" alt height="100" />

          <!-- Login button -->
          <button type="submit" class="btn btn-lg btn-primary btn-block mt-3">Post</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  created() {
    axios
      .get(`edit-post/${this.$route.params.id}`)
      .then(response => this.form.fill(response.data));
  },
  mounted() {
    this.$store.dispatch("getCategory");
  },
  data() {
    return {
      form: new Form({
        title: "",
        category_id: "",
        body: "",
        image: ""
      })
    };
  },
  computed: {
    getCategory() {
      return this.$store.getters.getCategory;
    }
  },
  methods: {
    changePhoto(event) {
      let file = event.target.files[0];
      if (file.size > 1048567) {
        alert("choose a image under 1 mb");
      } else {
        let reader = new FileReader();
        reader.onload = event => (this.form.image = event.target.result);
        reader.readAsDataURL(file);
      }
    },
    updatePost() {
      this.form.post(`update-post/${this.$route.params.id}`).then(response => {
        this.$router.push("/post-list");
        Toast.fire({
          icon: "success",
          title: "Post updated successfully"
        });
      });
    },
    photoLink() {
      let img = this.form.image;
      if (img.length > 20) {
        return img;
      } else {
        return "uploads/" + img;
      }
    }
  }
};
</script>