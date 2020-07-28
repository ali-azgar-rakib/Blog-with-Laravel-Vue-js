<template>
  <div>
    <div class="table-responsive">
      <div class="card mt-4 rounded-lg">
        <!-- Card body -->
        <div class="card-body">
          <div class="card-title">
            Category List
            <router-link to="add-category" class="btn btn-primary btn-icon m-2 float-right">
              <i class="fas fa-plus"></i> Add Category
            </router-link>
          </div>
          <table
            class="table table-striped table-bordered text-center"
            id="basicDataTable"
            style="width: 100%;"
          >
            <!-- Table head -->
            <thead>
              <tr>
                <th>
                  <input type="checkbox" />
                </th>
                <th>Serial</th>
                <th>Category Name</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </thead>
            <!-- Table body -->
            <tbody>
              <!-- Table Data -->
              <tr v-for="(category,index) in getCategory" :key="category.id">
                <td>
                  <input type="checkbox" />
                </td>
                <td>{{index+1}}</td>
                <td>{{category.cat_name}}</td>
                <td>{{category.created_at | timeformat}}</td>
                <td>
                  <div class="btn-group">
                    <router-link
                      :to="`edit-category/${category.id}`"
                      class="btn btn-sm btn-warning"
                    >edit</router-link>
                    <a
                      href
                      @click.prevent="deleteCategory(category.id)"
                      class="btn btn-sm btn-danger"
                    >delete</a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.$store.dispatch("getCategory");
  },
  computed: {
    getCategory() {
      return this.$store.getters.getCategory;
    },
  },
  methods: {
    deleteCategory(id) {
      axios
        .get("category/" + id)
        .then(() => {
          this.$store.dispatch("getCategory");
          Toast.fire({
            icon: "success",
            title: "Category delete successfully",
          });
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Category not delete.Try again!",
          });
        });
    },
  },
};
</script>