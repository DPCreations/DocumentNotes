<template>
    <p class="card-text" v-text="content" @click="edit"/>
</template>

<script>
  export default {
    name: "Paragraph",

    props: {
      id: {
        type: Number,
        required: true,
      },

      content: {
        type: String,
        required: true,
      },
    },

    methods: {
      edit() {
        console.log("Edit " + this.id);
      }
    }

  }
</script>
