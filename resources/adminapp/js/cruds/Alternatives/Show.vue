<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">remove_red_eye</i>
            </div>
            <h4 class="card-title">
              {{ $t('global.view') }}
              <strong>{{ $t('cruds.alternative.title_singular') }}</strong>
            </h4>
          </div>
          <div class="card-body">
            <back-button></back-button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <div class="table">
                    <tbody>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.alternative.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.alternative.fields.questions') }}
                        </td>
                        <td>
                          <datatable-list
                            :row="entry"
                            field="questions.question"
                          >
                          </datatable-list>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.alternative.fields.theme') }}
                        </td>
                        <td>
                          <datatable-list
                            :row="entry"
                            field="theme.micro_theme"
                          >
                          </datatable-list>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.alternative.fields.alt_1') }}
                        </td>
                        <td>
                          {{ entry.alt_1 }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.alternative.fields.alt_2') }}
                        </td>
                        <td>
                          {{ entry.alt_2 }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.alternative.fields.alt_3') }}
                        </td>
                        <td>
                          {{ entry.alt_3 }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.alternative.fields.alt_4') }}
                        </td>
                        <td>
                          {{ entry.alt_4 }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.alternative.fields.alt_5') }}
                        </td>
                        <td>
                          {{ entry.alt_5 }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.alternative.fields.right_alternative') }}
                        </td>
                        <td>
                          {{ entry.right_alternative }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.alternative.fields.type') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="type.question_type"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.alternative.fields.difficulty') }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="difficulty.difficulty"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                    </tbody>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import DatatableList from '@components/Datatables/DatatableList'
import DatatableSingle from '@components/Datatables/DatatableSingle'

export default {
  components: {
    DatatableList,
    DatatableSingle
  },
  data() {
    return {}
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('AlternativesSingle', ['entry'])
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchShowData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('AlternativesSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
