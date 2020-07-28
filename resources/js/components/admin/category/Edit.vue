<template>
  <div>
    <!-- Col 12 -->
    <div class="col-6 mt-4 mx-auto">
      <h4 class="text-center">Edit Category</h4>
      <div class="card rounded-lg">
        <div class="card-body">
          <form action="#" @submit.prevent="updateCategory()">
            <!-- Username -->
            <div class="input-group mt-3">
              <input
                class="form-control bg-light"
                type="text"
                name="cat_name"
                placeholder="Enter your category name"
                v-model="form.cat_name"
                :class="{ 'is-invalid': form.errors.has('cat_name') }"
              />
              <has-error :form="form" field="cat_name"></has-error>
            </div>
            <!-- Login button -->
            <button type="submit" class="btn btn-lg btn-primary btn-block mt-3">Update Category</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    axios
      .get(`edit-category/${this.$route.params.id}`)
      .then(response => this.form.fill(response.data.category));
  },
  data() {
    return {
      // Create a new form instance
      form: new Form({
        cat_name: ""
      })
    };
  },
  methods: {
    updateCategory() {
      this.form
        .post(`update-category/${this.$route.params.id}`)
        .then(response => {
          this.$router.push("/category");
          Toast.fire({
            icon: "success",
            title: "Category updated successfully"
          });
        });
    }
  }
};
</script>