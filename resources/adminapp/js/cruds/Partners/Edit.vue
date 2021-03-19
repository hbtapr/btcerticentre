<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.edit') }}
                <strong>{{ $t('cruds.partner.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.partner_name,
                      'is-focused': activeField == 'partner_name'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.partner.fields.partner_name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.partner_name"
                      @input="updatePartnerName"
                      @focus="focusField('partner_name')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.partner_address,
                      'is-focused': activeField == 'partner_address'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.partner.fields.partner_address')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.partner_address"
                      @input="updatePartnerAddress"
                      @focus="focusField('partner_address')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.partner_email,
                      'is-focused': activeField == 'partner_email'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.partner.fields.partner_email')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.partner_email"
                      @input="updatePartnerEmail"
                      @focus="focusField('partner_email')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.business_number,
                      'is-focused': activeField == 'business_number'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.partner.fields.business_number')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.business_number"
                      @input="updateBusinessNumber"
                      @focus="focusField('business_number')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('PartnersSingle', ['entry', 'loading'])
  },
  beforeDestroy() {
    this.resetState()
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchEditData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('PartnersSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setPartnerName',
      'setPartnerAddress',
      'setPartnerEmail',
      'setBusinessNumber'
    ]),
    updatePartnerName(e) {
      this.setPartnerName(e.target.value)
    },
    updatePartnerAddress(e) {
      this.setPartnerAddress(e.target.value)
    },
    updatePartnerEmail(e) {
      this.setPartnerEmail(e.target.value)
    },
    updateBusinessNumber(e) {
      this.setBusinessNumber(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'partners.index' })
          this.$eventHub.$emit('update-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
