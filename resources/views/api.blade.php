<!DOCTYPE html>
<html>
<head>
  <title>Simple RESTful API webservice</title>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <section>
    <div class="flex flex-row">
        <div class="md:w-1/2">
        <div class="p-2 pt-4 flex">
            <div class="mr-1">
                <select v-model="httpVerb" v-on:change="clearRequest" class="bg-gray-300 mb-2 py-2 border-4 border-gray-300">
                    <option selected value="get">{{__ ('api.GET') }}</option>
                    <option value="post">{{__ ('api.POST') }}</option>
                    <option value="put">{{__ ('api.PUT') }}</option>
                    <option value="delete">{{__ ('api.DELETE') }}</option>
                </select>
            </div>
            <div class="w-3/4">
                <input v-model="url" class="w-full text-bold bg-white px-4 py-2 ml-2 w-1/3 border-solid border-4 border-light-blue-500">
            </div>
            <div class="ml-4">
                <button v-on:click="makeRequest" class="bg-gray-300 text-black font-bold py-2 px-4 border-solid border-4 border-gray-300">
                {{__ ('api.Submit') }}
                </button>
            </div>
        </div>
        <div class="p-2 pt-4">
            <div v-if="httpVerb == 'get' || httpVerb == 'delete'" class="w-full">
                <div v-if="!errored">
                    <hr class="border-2 border-light-blue-500">
                    <h3 class="font-semibold ml-2 text-xl pb-2 pt-4">
                    {{ __('api.response') }} -> @{{ productsCount }} 
                        <code v-if="productsCount === 1">{{ __('api.results') }}</code>
                        <code v-else>{{ __('api.results') }}</code>
                    </h3>
                    <div class="pl-2"><p v-for="product in products" v-text="product"></p></div>
                </div>
                <div v-if="errored !==null" class="w-full">
                    @{{ errored }}
                </div>

            </div>
            <div v-if="httpVerb == 'post' || httpVerb == 'put'" class="w-full">
                <div v-if="!errored">
                    <h3 class="font-semibold">{{ __('api.enterRequestBody')}}</h3>
                    <textarea v-model="httpRequestString" class="w-full border-solid border-4 border-light-blue-500 text-sm" 
                        name="message" rows="7"></textarea>
                    <h3 class="font-semibold ml-2 text-xl pb-2 pt-4">
                        Request Response -> @{{ productsCount }} 
                        <code v-if="productsCount === 1">{{ __('api.results') }}</code>
                        <code v-else>{{ __('api.results') }}</code>
                    </h3>
                    <div class="pl-2"><p v-for="product in products" v-text="product"></p></div>
                </div>
                <div v-if="errored !==null" class="w-full">
                    @{{ errored }}
                </div>
            </div>
        </div>
        </div>
        <div class="w-1/2 lg:w-1/3">
            <div class="pl-2 pt-4">
                <div>
                    <h3 class="font-semibold text-sm">{{__ ('api.availableAPIEndpoints') }} ({{__ ('api.toCRUD') }})</h3>
                    <textarea v-model="availableAPIEndPoints" class="w-full border-solid border-4 border-red-300 text-xs" 
                        name="message" rows="29">
                    </textarea>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>

  <script>
    new Vue({
        el: '#app',
        data () {
            return {
                availableAPIEndPoints: this.readFromFile,
                errored: null,
                httpRequestObject: null,
                httpRequestString: null,
                httpVerb:'get',
                products: null,
                productsCount: null,
                url:'http://',
            }
        },
        mounted () {
            this.readFromFile;
        },
        computed: {
            readFromFile() {
                fetch('/rawtext')
                    .then(response => response.text())
                    .then(text => this.availableAPIEndPoints = text)         
            },
        },
        methods: {
            clearRequest() {
                this.errored = null
            },
            makeRequest() {
                this.errored = null

                if(this.httpVerb == 'get') {
                    axios.get(this.url)
                    .then(response => {
                        this.products = response.data; 
                        this.productsCount = response.data.length
                    })
                    .catch(error => {
                        console.log(error)                        
                        this.errored = JSON.stringify(error.message)
                    });
                }

                if(this.httpVerb == 'post') {
                    this.httpRequestObject = JSON.parse(this.httpRequestString)
                    axios.post(this.url,
                    this.httpRequestObject)
                    .then(response => {
                        this.products = response.data; 
                        this.productsCount = response.data.length
                    })
                    .catch(error => {
                        console.log(error)                        
                        this.errored = JSON.stringify(error.message)
                    });
                }

                if(this.httpVerb == 'put') {
                    this.httpRequestObject = JSON.parse(this.httpRequestString)
                    axios.put(this.url,
                    this.httpRequestObject)
                    .then(response => {
                        this.products = response.data; 
                        this.productsCount = response.data.length
                    })
                    .catch(error => {
                        console.log(error)                        
                        this.errored = JSON.stringify(error.message)
                    });
                }

                if(this.httpVerb == 'delete') {
                    axios.delete(this.url)
                    .then(response => {
                        this.products = response.data; 
                        this.productsCount = response.data.length
                    })
                    .catch(error => {
                        console.log(error)                        
                        this.errored = JSON.stringify(error.message)
                    });
                }
            }
        },
    })
  </script>
</body>
</html>
