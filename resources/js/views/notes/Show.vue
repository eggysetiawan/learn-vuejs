<template>
  <div class="container">
    <h1>{{ note.title }}</h1>
    <hr />
    <div class="mb-2">{{ note.published }} - {{ note.subject }}</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      note: [],
    };
  },

  mounted() {
    this.getNote();
  },

  methods: {
    async getNote() {
      let { data } = await axios.get(
        "/api/notes/" + this.$route.params.noteSlug
      );
      this.note = data.data;
    },
  },
};
</script>


