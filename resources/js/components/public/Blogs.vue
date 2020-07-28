<template>
  <div>
    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Blog left sidebar</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li>
                <router-link to="/">
                  <i class="icon-home"></i>
                </router-link>
                <i class="icon-angle-right"></i>
              </li>
              <li>
                <router-link to="/">Blog</router-link>
                <i class="icon-angle-right"></i>
              </li>
              <li class="active">Blog with left sidebar</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article v-for="(blog, index) in blogs" :key="index">
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3>
                        <a href="#">{{blog.title}}</a>
                      </h3>
                    </div>
                    <img :src="`uploads/${blog.image}`" alt />
                  </div>
                  <p>{{blog.body|textshort(500,'....')}}</p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li>
                        <i class="icon-calendar"></i>
                        <a href="#">{{blog.created_at|timeformat}}</a>
                      </li>
                      <li>
                        <i class="icon-user"></i>
                        <a href="#">{{blog.user.name}}</a>
                      </li>
                      <li>
                        <i class="icon-folder-open"></i>
                        <a href="#">Blog</a>
                      </li>
                    </ul>
                    <router-link :to="`/blog/${blog.id}`" class="pull-right">
                      Continue reading
                      <i class="icon-angle-right"></i>
                    </router-link>
                  </div>
                </div>
              </div>
            </article>
          </div>
          <!-- side bar  -->
          <sidebar></sidebar>
          <!-- side bar end  -->
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import sidebar from "./BlogSidebar";
export default {
  components: {
    sidebar,
  },
  mounted() {
    this.getCategoryPost();
  },
  computed: {
    blogs() {
      return this.$store.getters.getBlogs;
    },
  },
  methods: {
    getCategoryPost() {
      if (this.$route.params.id != null) {
        this.$store.dispatch("getCategoryPost", this.$route.params.id);
      } else {
        this.$store.dispatch("getBlogs");
      }
    },
  },
  watch: {
    $route(to, from) {
      this.getCategoryPost();
    },
  },
};
</script>