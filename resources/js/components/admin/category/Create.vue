<template>
  <div>
    <!-- Col 12 -->
    <div class="col-6 mt-4 mx-auto">
      <h4 class="text-center">Add New Category</h4>
      <div class="card rounded-lg">
        <div class="card-body">
          <form action="#" @click.prevent="addCategory()">
            <!-- Username -->
            <div class="input-group mt-3">
              <input
                class="form-control bg-light"
                type="text"
                name="category_name"
                placeholder="Enter your category name"
                v-model="form.category_name"
                :class="{ 'is-invalid': form.errors.has('category_name') }"
              />
              <has-error :form="form" field="category_name"></has-error>
            </div>
            <!-- Login button -->
            <button type="submit" class="btn btn-lg btn-primary btn-block mt-3">Add Category</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      // Create a new form instance
      form: new Form({
        category_name: ""
      })
    };
  },
  methods: {
    addCategory() {
      this.form.post("add-category").then(response => {
        this.$router.push("/category");
        Toast.fire({
          icon: "success",
          title: "Category added successfully"
        });
      });
    }
  }
};
</script>