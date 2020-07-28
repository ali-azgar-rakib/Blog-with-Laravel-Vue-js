<template>
  <div>
    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Post right sidebar</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li>
                <a href="#">
                  <i class="icon-home"></i>
                </a>
                <i class="icon-angle-right"></i>
              </li>
              <li>
                <a href="#">Blog</a>
                <i class="icon-angle-right"></i>
              </li>
              <li class="active">Blog post right sidebar</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article>
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
                  <p>{{blog.body}}</p>
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
                  </div>
                </div>
              </div>
            </article>
            <!-- author info -->
            <div class="about-author">
              <h5>
                <strong>
                  <a href="#">{{blog.user.name}}</a>
                </strong>
              </h5>
              <p>Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper ad qui, est rebum nulla argumentum ei.</p>
            </div>
          </div>
          <!-- side bar start  -->
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
    this.singlePost();
  },
  computed: {
    blog() {
      return this.$store.getters.getBlog;
    },
  },
  methods: {
    singlePost() {
      this.$store.dispatch("getBlog", this.$route.params.id);
    },
  },
  // watch: {
  //   $route(to, from) {
  //     this.singlePost();
  //   },
  // },
};
</script>