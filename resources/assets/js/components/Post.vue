<template>
    <div class="media">
        <like-button></like-button>
        <div class="media-left">
            <a href="#">
                <img class="media-object" v-bind:src="post.user.avatar" v-bind:alt="post.user.name + ' avatar'">
            </a>
        </div>
        <div class="media-body">
            <strong>{{ post.user.name }}</strong>
            <p>{{ post.body }}</p>
        </div>
    </div>
</template>

<script>
    import LikeButton from './LikeButton.vue'

    export default{
        props: [
            'post'
        ],

        component: [
            LikeButton
        ]
    }
</script>

<style scoped>
    .media {
        position: relative;
        margin: 0;
        padding: 10px;
    }

    .media:hover .like {
        display:block;
    }
</style>
