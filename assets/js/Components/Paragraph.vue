<template>
  <div class="card-text paragraph">
    <!-- Modal -->
    <div class="modal fade" :id="'commentModal' + id" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document" v-if="comment">
        <div class="modal-content">
          <div class="modal-body">
            <textarea class="form-control" v-model="comment.content" />
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-success" @click="updateComment" data-dismiss="modal">Save note</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" :id="'newCommentModal' + id" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <textarea class="form-control" v-model="newComment" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" @click="storeComment" data-dismiss="modal">Create note</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
          </div>
        </div>
      </div>
    </div>


    <div class="comments">
      <button  v-for="comment in comments"  class="btn ml-1" @click="viewComment(comment)" data-toggle="modal" :data-target="'#commentModal' + id"><i class="fa fa-comment-o"></i></button>
      <button class="btn ml-1" data-toggle="modal" :data-target="'#newCommentModal' + id"><i class="fa fa-plus"></i></button>
    </div>

    <p v-text="content"/>
  </div>
</template>

<script>
  import axios from 'axios';

  export default {
    mounted() {
      this.getComments();
    },

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

    data() {
      return {
        comments: [],
        comment: null,
        newComment: null,
      }
    },

    methods: {
      getComments() {
        axios
            .get(`/paragraph/${this.id}/comments`)
            .then(response => (this.comments = response.data.comments))
      },

      viewComment(comment) {
        this.comment = comment;
      },

      storeComment() {
        axios
            .post(`/paragraph/${this.id}/comments/store`, {
              'content': this.newComment
            })
            .then(() => (this.getComments()))
            .then(this.newComment = null)
      },

      updateComment() {
        axios
            .post(`/paragraph/comments/${this.comment.id}/updatew`, {
              'content': this.comment.content
            })
            .then(() => (this.getComments()))
            .then(this.comment = null)
      }
    }

  }
</script>

<style scoped>
  .paragraph {
    cursor: pointer;
  }

  .paragraph > .comments > button:first-child {
    margin-left: 0;
  }
</style>
