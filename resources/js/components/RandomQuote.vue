<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ author }}</div>
                    <div class="card-body">
                        {{ quote }}
                    </div>
                    <div class="card-footer">
                        <a href="#" v-on:click="saveQuote">
                            <i v-bind:class="[saved ? likedStyle : notLikedStyle]"></i>
                        </a>
                        <a href="#" v-on:click="downloadQuote">
                            <i class="far fa-arrow-alt-circle-down"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                saved: false,
                quote: '',
                author: '',
                likedStyle: 'far fa-heart liked',
                notLikedStyle: 'far fa-heart',
            };
        },
        created() {
            this.randomQuote();
        },
        methods: {
            randomQuote() {
                axios.get('/api/random-quote')
                    .then((response) => {
                        this.author = response.data.author;
                        this.quote = response.data.quote;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            saveQuote() {
                axios.post('/quotes', {
                    author: this.author,
                    quote: this.quote,
                })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });

                if(this.saved) {
                    this.saved = false;
                }
                else {
                    this.saved = true;
                }
            },
            downloadQuote() {
                axios({
                    url: "/quotes-download?author=" + this.author + "&quote=" + this.quote,
                    method: 'GET',
                    responseType: 'blob',
                }).then((response) => {
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', this.quote.substr(0,10).toLowerCase().replace(/\s/g, '') + ".txt");
                    document.body.appendChild(link);
                    link.click();
                });
            }
        }
    }
</script>

<style>
    .liked {color: red}
</style>

