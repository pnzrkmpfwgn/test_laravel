<template>
    <div>
        <button
            class="btn btn-outline-primary"
            @click="likePost"
            v-text="buttonText"
        ></button>
    </div>
</template>

<script>
export default {
    props: ["propertyId", "likes"],
    mounted() {
        console.log("component mounted.");
    },
    data: function () {
        return {
            status: this.likes,
        };
    },
    methods: {
        likePost() {
            axios
                .post("/like/" + this.propertyId)
                .then((response) => {
                    console.log(response.data);
                    this.status = !this.status;
                })
                .catch((error) => {
                    if (error.response.status == 401) {
                        window.location = "/login";
                    }
                });
        },
    },
    computed: {
        buttonText() {
            return this.status ? "Unfavorite" : "Favorite";
        },
    },
};
</script>
