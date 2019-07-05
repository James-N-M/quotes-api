<template>
<div>
    <div class="bg-gray-200 flex flex-grow items-center py-4 rounded">
        <i class="fas fa-search px-3 text-gray-500"></i>
        <input class="bg-gray-200 flex-grow text-sm outline-none"
               type="text"
               placeholder="Search free high quality quotes"
               v-model="queryName"
               v-on:keyup="searchTags"
        />
    </div>
    <div v-if="tags.length" class="bg-white my-1 py-4 rounded">
        <ul v-for="tag in tags">
            <a v-bind:href="'/search/quotes/' + tag.id"><li class="hover:bg-gray-200 px-6 py-3">{{tag.name}}</li></a>
        </ul>
    </div>
</div>

</template>

<script>
    export default {
        data() {
            return {
                tags: [],
                queryName: "",
            };
        },
        methods: {
            searchTags() {
                if(this.queryName) {
                    axios.get('/api/tags-search?name=' + this.queryName)
                        .then((response) => {
                            let data = response.data;
                            this.tags = data.slice(0,5);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                } else {
                    this.tags = [];
                }
            }
        }
    }
</script>
