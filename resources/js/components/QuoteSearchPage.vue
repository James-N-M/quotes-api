<template>
    <div>
        <p v-model="tagId"></p>
        <p v-model="tagName"></p>
    </div>
</template>

<script>
    export default {
        components: {
        },
        data() {
            return {
                tagId:  '',
                tagName: '',
            };
        },
        mounted: function () {
            this.tagName = this.$route.params.tag.id;
            this.tagId = this.$route.params.tag.name;
            console.log(this.tagName);
            console.log(this.tagId);
        },
        methods: {
        }
    }
</script>
