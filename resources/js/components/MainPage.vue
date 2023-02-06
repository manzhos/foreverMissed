<template>
  <button
      class="main-btn"
      @click="showPopupInvite"
  >
    <font-awesome-icon icon="fa-solid fa-user-plus" />{{ 'Invite Now' }}
  </button>

  <!-- Modal -->
  <invite-modal
      v-if="isPopupInviteOpen"
      @closePopup="closePopupInvite"
  />

</template>

<script>
import InviteModal from './InviteModal'

export default {
  name: "MainPage",
  components: {
    InviteModal
  },
  data() {
    return{
      isPopupInviteOpen: false
    }
  },
  methods: {
    showPopupInvite() {
      this.isPopupInviteOpen = true;
    },
    closePopupInvite() {
      this.isPopupInviteOpen = false;
    }
  }
}
</script>