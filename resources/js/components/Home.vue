<template>
    <div>
        <div>
            <section id="welcome-section" class="mb-8 flex flex-col items-center justify-center">
                <div>
                    <h1 class="text-6xl text-white font-bold">quotes</h1>
                    <p class="text-white text-2xl">Beautiful, free quotes.</p>
                    <p class="pb-2 text-2xl text-white">Gifted by the world’s most generous community of writers. 🎁</p>
                    <div class="bg-gray-200 flex flex-grow items-center py-4 rounded">
                        <i class="fas fa-search px-3 text-gray-500"></i>
                        <input class="bg-gray-200 flex-grow text-sm outline-none" type="text" placeholder="Search free high quality quotes">
                    </div>
                    <p class="py-2 text-white">Trending searches: <span class="hover:font-medium">flower</span>, <span class="hover:font-medium">fantasy</span>, <span class="hover:font-medium">motivational</span>, <span class="hover:font-medium">love</span>, <span class="hover:font-medium">sad</span></p>
                </div>
            </section>
        </div>
        <div class="flex flex-wrap justify-around mx-64">
            <v-dialog/>
            <div v-for="quote in quotes" class="flex flex-col h-64 justify-between mx-2 my-4 shadow-lg w-64" style="height: 400px;width: 400px;" v-on:click="show()">
                <div class="flex justify-end">
                    <button class="bg-gray-300 px-6 py-4 rounded-bl-full"><i class="fa-heart fas hover:text-red-600 text-lg text-red-400"></i></button>
                </div>
                <div class="mx-8">
                    <p class="font-mono leading-normal pb-2">"{{quote.quote}}"</p>
                    <i class="font-serif">- {{quote.author}}</i>
                </div>
                <div class="flex justify-between mx-6 my-4">
                    <div class="flex items-center">
                        <div class="bg-black h-8 mr-2 rounded-full w-8"></div>
                        <a href="#">{{quote.user.name}}</a>
                    </div>
                    <div>
                        <button><i class="fas fa-arrow-down"></i></button>
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
                quotes: [],
            };
        },
        mounted: function () {
            this.getAllQuotes()
        },
        methods: {
            getAllQuotes() {
                axios.get('/api/quotes')
                    .then((response) => {
                        let data = response.data;
                        this.quotes = data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            show () {
                this.$modal.show('dialog', {
                    title: 'Alert!',
                    text: 'You are too awesome',
                    buttons: [
                        {
                            title: 'Deal with it',
                            handler: () => { alert('Woot!') }
                        },
                        {
                            title: '',       // Button title
                            default: true,    // Will be triggered by default if 'Enter' pressed.
                            handler: () => {} // Button click handler
                        },
                        {
                            title: 'Close'
                        }
                    ]
                })
            },
            hide () {
                this.$modal.hide('hello-world');
            }
        }
    }
</script>
