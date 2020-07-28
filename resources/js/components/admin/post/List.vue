<template>
  <div>
    <div class="table-responsive">
      <div class="card mt-4 rounded-lg">
        <!-- Card body -->
        <div class="card-body">
          <div class="card-title">
            Post List
            <router-link to="create-post" class="btn btn-primary btn-icon m-2 float-right">
              <i class="fas fa-plus"></i> Add Post
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
                <th>Serial</th>
                <th>User</th>
                <th>Category</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <!-- Table body -->
            <tbody>
              <!-- Table Data -->
              <tr v-for="(post,index) in getPosts" :key="post.id">
                <td>{{index+1}}</td>
                <td v-if="post.user">{{post.user.name}}</td>
                <td v-else>empty</td>
                <td v-if="post.category">{{post.category.cat_name}}</td>
                <td v-else>empty</td>
                <td>{{post.title}}</td>
                <td>{{post.body | textshort(50,'....')}}</td>
                <td>
                  <div class="btn-group">
                    <!-- Button trigger modal -->
                    <button
                      type="button"
                      class="btn btn-sm btn-primary"
                      data-toggle="modal"
                      :data-target="dataTarget(post.id)"
                    >view</button>
                    <router-link :to="`edit-post/${post.id}`" class="btn btn-sm btn-warning">edit</router-link>

                    <a
                      href
                      @click.prevent="deletePost(post.id)"
                      class="btn btn-sm btn-danger"
                    >delete</a>
                  </div>

                  <div
                    class="modal fade"
                    :id="showId(post.id)"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="exampleModalLabel"
                    aria-hidden="true"
                  >
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title" id="exampleModalLabel">{{post.title}}</h3>

                          <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                          >
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <img :src="showPhoto(post.image)" alt width="300" />
                          <p>{{post.body}}</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
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
    this.$store.dispatch("getAllPost");
  },
  computed: {
    getPosts() {
      return this.$store.getters.getPost;
    }
  },
  methods: {
    deletePost(id) {
      axios.get("/delete-post/" + id).then(response => {
        this.$store.dispatch("getAllPost");
        Toast.fire({
          icon: "success",
          title: "Post delete successfully"
        });
      });
    },
    showPhoto(img) {
      return "uploads/" + img;
    },
    dataTarget(name) {
      return "#s" + name;
    },
    showId(user) {
      return "s" + user;
    }
  }
};
</script>