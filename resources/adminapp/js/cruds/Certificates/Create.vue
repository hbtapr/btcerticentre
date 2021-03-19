<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.create') }}
                <strong>{{ $t('cruds.certificate.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.certificate.fields.cert_pdf')
                    }}</label>
                    <attachment
                      :route="getRoute('certificates')"
                      :collection-name="'certificate_cert_pdf'"
                      :media="entry.cert_pdf"
                      :max-file-size="2"
                      @file-uploaded="insertCertPdfFile"
                      @file-removed="removeCertPdfFile"
                      :max-files="1"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.area,
                      'is-focused': activeField == 'area'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.certificate.fields.area')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.area"
                      @input="updateArea"
                      @focus="focusField('area')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.minnimum_approval_rate,
                      'is-focused': activeField == 'minnimum_approval_rate'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.certificate.fields.minnimum_approval_rate')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.minnimum_approval_rate"
                      @input="updateMinnimumApprovalRate"
                      @focus="focusField('minnimum_approval_rate')"
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
import Attachment from '@components/Attachments/Attachment'

export default {
  components: {
    Attachment
  },
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('CertificatesSingle', ['entry', 'loading'])
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('CertificatesSingle', [
      'storeData',
      'resetState',
      'insertCertPdfFile',
      'removeCertPdfFile',
      'setArea',
      'setMinnimumApprovalRate'
    ]),
    updateArea(e) {
      this.setArea(e.target.value)
    },
    updateMinnimumApprovalRate(e) {
      this.setMinnimumApprovalRate(e.target.value)
    },
    getRoute(name) {
      return `${axios.defaults.baseURL}${name}/media`
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'certificates.index' })
          this.$eventHub.$emit('create-success')
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
