<template>
    <div class="mx-8 py-8">
        <div>
            <div class="pb-8">
                <h1 class="font-bold text-5xl">{{uppercaseTag}} quotes</h1>
                <p class="text-lg">{{quotesCount}} free {{tagName}} quotes</p>
            </div>
            <div>
                <ul class="flex">
                    <li class="text-gray-600 hover:font-medium hover:text-black" ><li class="text-lg">{{quotesCount}} Quotes</li>
                    <li class="mx-4 text-gray-600 hover:font-medium hover:text-black" ><li class="text-lg">8 Users</li>
                </ul>
            </div>
        </div>

        <div class="flex flex-wrap justify-around mx-64">
            <v-dialog/>

            <div v-for="quote in quotes" class="w-64">
                <div class="flex flex-col h-64 justify-between mx-2 my-4 shadow-lg" style="height: 400px;width: 400px;">
                    <div class="flex justify-end">
                        <button class="bg-gray-300 px-6 py-4 rounded-bl-full"><i class="fa-heart fas hover:text-red-600 text-lg text-red-400"></i></button>
                    </div>
                    <div class="mx-8" v-on:click="show(quote)" style="cursor: pointer;">
                        <p class="font-mono leading-normal pb-2">"{{quote.quote}}"</p>
                        <i class="font-serif">- {{quote.author}}</i>
                    </div>
                    <div class="flex justify-between mx-6 my-4">
                        <div class="flex items-center">
                            <div class="bg-black h-8 mr-2 rounded-full w-8"></div>
                            <a href="#">{{quote.user.name}}</a>
                        </div>
                        <div>
                            <button v-on:click="download(quote)"><i class="fas fa-arrow-down"></i></button>
                        </div>
                    </div>
                </div>
                <div class="pl-2">
                    <ul class="flex " >
                        <a v-for="tag in quote.tags" href="#"><li class="bg-gray-200 font-hairline hover:bg-gray-300 hover:text-black mr-2 px-2 text-gray-500">{{tag.name}}</li></a>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
    export default {
        props: ['tag'],
        components: {
        },
        data() {
            return {
                tagId:  this.tag.id,
                tagName: this.tag.name,
                quotes: []
            };
        },
        mounted: function () {
            this.tagId = this.tag.id; 
            this.getTagQuotes();
        },
        methods: {
            getTagQuotes() {
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
