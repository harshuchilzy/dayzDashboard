<template>
  <div class="mb-5 text-right" v-if="create">
    <Link class="px-3 py-2 bg-blue-600 rounded-lg text-white hover:bg-indigo-500" :href="create.href">{{ create.label }}</Link>
  </div>
  <div class="flex flex-col">
    <div class="flex-1 mb-3">
      <div class="flex justify-between">
        <div class="relative float-left" v-if="search">
          <input type="search" class="
              w-full
              pl-10
              pr-4
              py-2
              rounded-lg
              shadow
              focus:outline-none focus:shadow-outline
              text-gray-600
              font-medium
            " @input="search_query" v-model="q" placeholder="Search..." />
          <div class="absolute top-0 left-0 inline-flex items-center p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
              <circle cx="10" cy="10" r="7" />
              <line x1="21" y1="21" x2="15" y2="15" />
            </svg>
          </div>
        </div>

        <div class="flex gap-4 w-1/4 items-center" v-if="pagination">
          <div class="md:w-3/4">
            <label class="">Results per page</label>
          </div>
          <div class="md:w-1/4">
            <select @change="result_count" v-model="per_page" class="
                form-select
                appearance-none
                block
                w-full
                px-2
                py-2
                font-medium
                text-gray-600
                shadow
                bg-white bg-clip-padding bg-no-repeat
                rounded-lg
                transition
                ease-in-out
                m-0
                focus:text-gray-700
                focus:bg-white
                focus:border-blue-600
                focus:outline-none
              " aria-label=".form-select-sm example">
              <option value="15" selected>15</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="100">100</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
              <tr>
                <th v-for="(column, i) in columns" :key="i" scope="col" class="
                    px-6
                    py-3
                    text-left text-xs
                    font-medium
                    text-gray-500
                    uppercase
                    tracking-wider
                  ">
                  {{ column.title }}
                </th>
              </tr>
            </thead>

            <tbody class="bg-white">
              <tr v-for="(row, index) in data" :key="index" :class="index % 2 === 0 ? 'bg-white' : 'bg-gray-50'">
                <td v-for="column in columns" :key="column.key" class="px-6 py-4 whitespace-nowrap">
                  <slot :name="'cell-' + column.key" :row="row">
                    {{ lodashGet(row, column.key) }}
                  </slot>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="flex justify-between mx-auto my-3" v-if="pagination">
          <div>
            <div class="py-2 px-3 bg-white rounded-lg text-sm text-gray-600">
              Showing {{ pagination.from }} to {{ pagination.to }} of
              {{ pagination.total }}
            </div>
          </div>
          <ul class="flex justify-end text-sm">
            <li>
              <button @click="paginate(pagination.current_page - 1)" :disabled="pagination.current_page - 1 < 1" :class="
                pagination.current_page - 1 < 1 ? 'disabled:opacity-60' : ''
              " class="
                  h-10
                  px-5
                  text-gray-600
                  transition-colors
                  duration-150
                  bg-white
                  focus:shadow-outline
                  hover:bg-indigo-100
                  rounded-l-lg
                ">
                Previous
              </button>
            </li>
            <li v-for="index in pagination.last_page" :key="index">
              <button @click="paginate(index)" :class="
                pagination.current_page == index
                  ? 'text-white bg-indigo-600 rounded-none'
                  : ''
              " class="
                  h-10
                  px-5
                  text-gray-600
                  transition-colors
                  duration-150
                  bg-white
                  focus:shadow-outline
                  hover:bg-indigo-100
                ">
                {{ index }}
              </button>
            </li>
            <li>
              <button @click="paginate(pagination.current_page + 1)" :disabled="pagination.current_page + 1 > pagination.last_page" :class="
                pagination.current_page + 1 > pagination.last_page
                  ? 'disabled:opacity-60'
                  : ''
              " class="
                  h-10
                  px-5
                  text-gray-600
                  transition-colors
                  duration-150
                  bg-white
                  focus:shadow-outline
                  hover:bg-indigo-100
                  rounded-r-lg
                ">
                Next
              </button>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { get } from "lodash";
import { ref } from "@vue/reactivity";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  props: ["data", "pagination", "columns", "search", "create"],
  components: {
    Link,
  },
  setup(props, context) {
    function lodashGet(array, key) {
      return get(array, key);
    }

    const q = ref(null);

    function search_query() {
      console.log(q.value);
      context.emit(
        "paginate",
        props.pagination.first_page,
        per_page.value,
        q.value
      );
    }

    const per_page = ref(15);
    function result_count() {
      context.emit("paginate", props.pagination.first_page, per_page.value);
    }

    function paginate(page) {
      context.emit("paginate", page, per_page.value);
    }

    return {
      q,
      search_query,
      per_page,
      result_count,
      paginate,
      lodashGet,
    };
  },
};
</script>