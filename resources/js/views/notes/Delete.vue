<template>
  <button ref="deleteNote" @click="destroyNote" class="btn btn-danger">
    Delete
  </button>
</template>

<script>
export default {
  props: ["endpoint"],
  methods: {
    async destroyNote() {
      let q = window.confirm("are you sure?");
      if (q == true) {
        let response = await axios.delete(`/api/notes/${this.endpoint}/delete`);
        if (response.status == 200) {
          this.$toasted.show(response.data.message, {
            type: "success",
            duration: 6000,
          });
          this.$refs.deleteNote.parentNode.parentNode.remove();
        }
      } else {
        this.$toasted.show(response.data.message, {
          type: "error",
          duration: 6000,
        });
      }
    },
  },
};
</script>
