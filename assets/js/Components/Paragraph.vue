<template>
  <div class="card-text paragraph">
    <!-- Modal -->
    <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <p v-text="comment"/>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="newCommentModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <textarea class="form-control" v-model="newComment"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="storeComment" data-dismiss="modal">Gem note</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
          </div>
        </div>
      </div>
    </div>


    <div class="comments" v-if="comments.length > 0">
      <button  v-for="comment in comments"  class="btn ml-1" @click="viewComment(comment)" data-toggle="modal" data-target="#commentModal"><i class="fa fa-comment-o"></i></button>
      <button class="btn ml-1" data-toggle="modal" data-target="#newCommentModal"><i class="fa fa-plus"></i></button>
    </div>

    <p v-text="content"/>
  </div>
</template>

<script>
  import $ from 'jquery';
  import axios from 'axios';
  import bootstrap from 'bootstrap';

  export default {
    name: "Paragraph",

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
        this.comment = comment.content;
      },

      storeComment() {
        axios
            .post(`/paragraph/${this.id}/comments/store`, {
              'content': this.newComment
            })
            .then(response => (this.comments = response.data.comments))
            .then(this.newComment = null)
      },

      updateComment() {

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
