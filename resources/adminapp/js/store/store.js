import Vue from 'vue'
import Vuex from 'vuex'

import Alert from './modules/alert'
import I18NStore from './modules/i18n'

import PermissionsIndex from './cruds/Permissions'
import PermissionsSingle from './cruds/Permissions/single'
import RolesIndex from './cruds/Roles'
import RolesSingle from './cruds/Roles/single'
import UsersIndex from './cruds/Users'
import UsersSingle from './cruds/Users/single'
import CertificatesIndex from './cruds/Certificates'
import CertificatesSingle from './cruds/Certificates/single'
import PartnersIndex from './cruds/Partners'
import PartnersSingle from './cruds/Partners/single'
import ClientsIndex from './cruds/Clients'
import ClientsSingle from './cruds/Clients/single'
import QuestionsIndex from './cruds/Questions'
import QuestionsSingle from './cruds/Questions/single'
import ThemesIndex from './cruds/Themes'
import ThemesSingle from './cruds/Themes/single'
import AttemptsIndex from './cruds/Attempts'
import AttemptsSingle from './cruds/Attempts/single'
import DemosIndex from './cruds/Demos'
import DemosSingle from './cruds/Demos/single'
import AlternativesIndex from './cruds/Alternatives'
import AlternativesSingle from './cruds/Alternatives/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    Alert,
    I18NStore,
    PermissionsIndex,
    PermissionsSingle,
    RolesIndex,
    RolesSingle,
    UsersIndex,
    UsersSingle,
    CertificatesIndex,
    CertificatesSingle,
    PartnersIndex,
    PartnersSingle,
    ClientsIndex,
    ClientsSingle,
    QuestionsIndex,
    QuestionsSingle,
    ThemesIndex,
    ThemesSingle,
    AttemptsIndex,
    AttemptsSingle,
    DemosIndex,
    DemosSingle,
    AlternativesIndex,
    AlternativesSingle
  },
  strict: debug
})
