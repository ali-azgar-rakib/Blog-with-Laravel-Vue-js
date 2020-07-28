import Axios from "axios";

export default {
    state: {
        categories: [],
        posts: [],
        blogs: [],
        blog: [],
        allCategory: [],
        sidebarBlogs: []

    },
    getters: {
        getCategory(state) {
            return state.categories;
        },
        getPost(state) {
            return state.posts;
        },
        getBlogs(state) {
            return state.blogs;
        },
        getBlog(state) {
            return state.blog;
        },
        getAllCategory(state) {
            return state.allCategory;
        },
        getSidebarBlogs(state) {
            return state.sidebarBlogs;
        }

    },

    actions: {
        getCategory(context) {
            axios.get('/all_category').then((response) => {
                context.commit('categories', response.data.categories)
            })
        },
        getAllPost(context) {
            axios.get('/all_post')
                .then(response => context.commit('posts', response.data.posts))
        },
        getBlogs(context) {
            axios.get('/blogs')
                .then(response => context.commit('blogs', response.data.blogs))
        },
        getBlog(context, payload) {
            axios.get('/blog/' + payload)
                .then(response => context.commit('blog', response.data.post))
        },
        getAllCategory(context) {
            axios.get('/all-category')
                .then(response => context.commit('allCategory', response.data))
        },
        getCategoryPost(context, payload) {
            axios.get('/category-post/' + payload)
                .then(response => context.commit('blogs', response.data))
        },
        search(context, payload) {
            axios.get('search?search=' + payload)
                .then(response => context.commit('search', response.data))
        },
        getSidebarBlogs(context) {
            axios.get('sidebar-blogs')
                .then(response => context.commit('sidebarBlogs', response.data))
        }


    },
    mutations: {
        categories(state, payload) {
            return state.categories = payload;
        },
        posts(state, payload) {
            return state.posts = payload
        },
        blogs(state, payload) {
            return state.blogs = payload
        },
        blog(state, payload) {
            return state.blog = payload
        },
        allCategory(state, payload) {
            return state.allCategory = payload
        },
        search(state, payload) {
            return state.blogs = payload
        },
        sidebarBlogs(state, payload) {
            return state.sidebarBlogs = payload
        }
    }

}
