<template>
    <div class="container">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li v-for="n in totalPage" :key="n" v-on:click="changePage(n)" class="page-item"><a class="page-link" href="#">{{ n }}</a></li>
            </ul>
        </nav>
        <div class="row justify-content-center">
            <div v-for="post in posts" :key="post.id" class="card col-md-3" style="width: 18rem;">
                <img class="card-img-top" :src="post.image" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ post.title }}</h5>
                    <p class="card-text">{{ post.body }}</p>
                    <p class="card-text">{{ post.tags }}</p>
                    <a href="#" class="btn btn-primary">Buy</a>
                    <button v-on:click="deleteById(post.id)" type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        mounted() {
            this.getPosts();
        },
        data() {
            return {
                posts: [],
                currentPage: 1,
                totalPage: 0
            }
        },
        methods: {
            getPosts() {
                axios.get(`/api/posts?page=${this.currentPage}`).then((response) => {
                    this.posts = response.data.data
                    this.totalPage = response.data.last_page
                });
            },
            changePage(nPage) {
                this.currentPage = nPage;
                this.getPosts();
            },
            deleteById(id) {
                axios.delete(`api/posts/${id}`).then((response) => {
                   console.log(response);
                   this.getPosts();
                });
            }
        }
    }
</script>