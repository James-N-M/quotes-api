<template>
    <div class="mx-4">
        <div>
            <h1 class="font-bold text-5xl">{{uppercaseTag}} quotes</h1>
            <p class="text-lg">{{quotesCount}} free {{tagName}} quotes</p>
        </div>
        <div>
            <ul>
                <li class="text-lg">{{quotesCount}} Quotes</li>
            </ul>
        </div>
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
                quotes: []
            };
        },
        mounted: function () {
            this.tagId = this.$route.params.tag.id;
            this.tagName = this.$route.params.tag.name;
            this.getAllQuotes();
        },
        methods: {
            getAllQuotes() {
                axios.get(`/api/tags/${this.tagId}/quotes`)
                    .then((response) => {
                        let data = response.data;
                        this.quotes = data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        computed: {
            uppercaseTag: function () {
                return this.tagName.charAt(0).toUpperCase() + this.tagName.slice(1,this.tagName.length);
            },
            quotesCount: function () {
                return this.quotes.length;
            }
        }
    }
</script>
