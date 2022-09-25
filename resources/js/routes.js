import Vue from 'vue';
import VueRouter from 'vue-router';
//Applicant Component
import ApplicantAppointment       from './applicants/Appointment.vue';
import ApplicantAppointments      from './applicants/Appointments.vue';
import ApplicantDashboard         from './applicants/Dashboard.vue';
import ApplicantPayment           from './applicants/Payment.vue';
import ApplicantPayments          from './applicants/Payments.vue';
import ApplicantProfile           from './applicants/Profile.vue';

    import ApplicantDetailsForm         from './applicants/forms/Details.vue';
    import ApplicantAppointmentForm     from './applicants/forms/Appointment.vue';
    import ApplicantPaymentForm         from './applicants/forms/Payment.vue';

Vue.component('ApplicantAppointment',          ApplicantAppointment);
Vue.component('ApplicantAppointments',         ApplicantAppointments);
Vue.component('ApplicantDashboard',            ApplicantDashboard);
Vue.component('ApplicantPayment',              ApplicantPayment);
Vue.component('ApplicantPayments',             ApplicantPayments);
Vue.component('ApplicantProfile',              ApplicantProfile);
    
    Vue.component('ApplicantDetailsForm',      ApplicantDetailsForm);
    Vue.component('ApplicantAppointmentForm',  ApplicantAppointmentForm);
    Vue.component('ApplicantPaymentForm',      ApplicantPaymentForm);

//Blog Components
import BlogPosts        from './blog/Posts.vue';
import BlogPost        from './blog/Post.vue';

Vue.component('BlogPost',          BlogPost);
Vue.component('BlogPosts',         BlogPosts);

//Chat Components
import BranchAdmin  from './branches/Admin.vue';
import BranchAll  from './branches/All.vue';
import BranchForm  from './branches/Form.vue';
import BranchSingle  from './branches/Single.vue';

Vue.component('BranchAdmin', BranchAdmin);
Vue.component('BranchAll', BranchAll);
Vue.component('BranchForm', BranchForm);
Vue.component('BranchSingle', BranchSingle);

import ChatContacts from './chats/Contacts.vue';
import ChatList from './chats/List.vue';
import ChatMain from './chats/Main.vue';
import ChatMessages from './chats/Messages.vue';
import ChatPrivate  from './chats/Private.vue';

    import ChatFormInput        from './chats/forms/Input.vue';
    import ChatFormContactList  from './chats/forms/ContactList.vue';

Vue.component('ChatContacts', ChatContacts);
Vue.component('ChatList', ChatList);
Vue.component('ChatMain', ChatMain);
Vue.component('ChatMessages', ChatMessages);
Vue.component('ChatPrivate', ChatPrivate);

    Vue.component('ChatFormInput', ChatFormInput);
    Vue.component('ChatFormContactList', ChatFormContactList);

import ContactAll       from './components/contacts/All.vue';
import ContactSingle    from './components/contacts/Single.vue';
Vue.component('ContactAll', ContactAll);
Vue.component('ContactSingle', ContactSingle);

import DashboardAppointment from './dashboard/Appointment.vue';
import DashboardActivities  from './dashboard/Activities.vue';

import DashboardMain        from './dashboard/Main.vue';
import DashboardBirthday    from './dashboard/Birthday.vue';
import DashboardChat        from './dashboard/Chat.vue';
import DashboardNewStaff    from './dashboard/NewStaff.vue';
import DashboardNotice      from './dashboard/Notice.vue';
import DashboardPrescription from './dashboard/Prescription.vue';
import DashboardStaffMonth  from './dashboard/StaffMonth.vue';
import DashboardSummary     from './dashboard/Summary.vue';
import DashboardTicket      from './dashboard/Ticket.vue';

Vue.component('DashboardMain',          DashboardMain);
Vue.component('DashboardActivities',    DashboardActivities);
Vue.component('DashboardAppointment',   DashboardAppointment);
Vue.component('DashboardBirthday',      DashboardBirthday);
Vue.component('DashboardChat',          DashboardChat);
Vue.component('DashboardNewStaff',      DashboardNewStaff);
Vue.component('DashboardNotice',        DashboardNotice);
Vue.component('DashboardPrescription',  DashboardPrescription);
Vue.component('DashboardStaffMonth',    DashboardStaffMonth);
Vue.component('DashboardSummary',       DashboardSummary);
Vue.component('DashboardTicket',        DashboardTicket);

import DepartmentAdmin     from './departments/Admin.vue';
import DepartmentAll       from './departments/All.vue';
import DepartmentForm      from './departments/Form.vue';
import DepartmentSingle    from './departments/Single.vue';

Vue.component('DepartmentAdmin',        DepartmentAdmin);
Vue.component('DepartmentAll',          DepartmentAll);
Vue.component('DepartmentForm',         DepartmentForm);
Vue.component('DepartmentSingle',       DepartmentSingle);

import EServiceFrontAppointment      from './eservices/front/Appointment.vue';
import EServiceFrontAppointments     from './eservices/front/Appointments.vue';
import EServicePayments              from './eservices/front/Payments.vue';

    import EServiceFormApplicant      from './eservices/front/forms/Applicant.vue';
    import EServiceFormPayment      from './eservices/front/forms/Payment.vue';
Vue.component('EServiceFrontAppointment',        EServiceFrontAppointment);
Vue.component('EServiceFrontAppointments',       EServiceFrontAppointments);
Vue.component('EServicePayments',                EServicePayments);

    Vue.component('EServiceFormApplicant', EServiceFormApplicant);
    Vue.component('EServiceFormPayment', EServiceFormPayment);

import Users from './components/Users.vue';

//Declare Partials
import DetailLoansAccount from './components/partials/details/LoansAccount.vue';
import DetailSavingsAccount from './components/partials/details/SavingsAccount.vue';

//Declare Form Components  
import FormBioData from './components/partials/forms/BioData.vue';
import FormClosure from './components/partials/forms/Closure.vue';
import FormContact from './components/partials/forms/Contact.vue';
import FormNextOfKin from './components/partials/forms/NextOfKin.vue';
import FormRepayment from './components/partials/forms/Repayment.vue';
import FormSavingsAccount from './components/partials/forms/SavingsAccount.vue';
import FormSecurity from './components/partials/forms/Security.vue';
import FormWithdrawal from './components/partials/forms/Withdrawal.vue';


//Declare LMS Pages
import LmsCategories from './components/lms/admin/Categories.vue';
import LmsCertificates from './components/lms/admin/Certificates.vue';
import LmsCourses from './components/lms/admin/Courses.vue';
import LmsExams from './components/lms/admin/Exams.vue';

import LmsStdCourse from './components/lms/student/Course.vue';
import LmsStdCourses from './components/lms/student/Courses.vue';
import LmsStdExams from './components/lms/student/Exams.vue';
//import LmsStdLesson from './components/lms/student/Lesson.vue';

import LmsTutCourses from './components/lms/tutors/Courses.vue';
import LmsTutExams from './components/lms/tutors/Exams.vue';

//Declare LMS Details
import LmsDetailContact from './components/lms/details/Contact.vue';
import LmsDetailCourse from './components/lms/details/Course.vue';
import LmsDetailCourseAssignedTo from './components/lms/details/CourseAssignees.vue';
import LmsDetailCourseLessons from './components/lms/details/CourseLessons.vue';
import LmsDetailQuestions from './components/lms/details/Questions.vue';
import LmsDetailSubCategory from './components/lms/details/SubCategory.vue';

Vue.component('Users', Users);

//All Details are declared here
Vue.component('DetailLoansAccount', DetailLoansAccount)
Vue.component('DetailSavingsAccount', DetailSavingsAccount)

//All Forms are declared here
Vue.component('FormBioData', FormBioData);
Vue.component('FormClosure', FormClosure);
Vue.component('FormContact', FormContact);
Vue.component('FormNextOfKin', FormNextOfKin);
Vue.component('FormSecurity', FormSecurity);

//Declare All LMS pages
Vue.component('LmsCategories', LmsCategories);
Vue.component('LmsCertificates', LmsCertificates);
Vue.component('LmsCourses', LmsCourses);
Vue.component('LmsExams', LmsExams);

Vue.component('LmsStdCourse', LmsStdCourse);
Vue.component('LmsStdCourses', LmsStdCourses);
Vue.component('LmsStdExams', LmsStdExams);
//Vue.component('LmsStdLesson', LmsStdLesson);

Vue.component('LmsTutCourses', LmsTutCourses);
Vue.component('LmsTutExams', LmsTutExams);

//Declare All LMS Details
Vue.component('LmsDetailContact', LmsDetailContact);
Vue.component('LmsDetailCourse', LmsDetailCourse);
Vue.component('LmsDetailCourseAssignedTo', LmsDetailCourseAssignedTo);
Vue.component('LmsDetailCourseLessons', LmsDetailCourseLessons);
Vue.component('LmsDetailQuestions', LmsDetailQuestions);
Vue.component('LmsDetailSubCategory', LmsDetailSubCategory);


//Network Checkers
import NetworkCard      from './components/internet/Card.vue';
import NetworkDashboard from './components/internet/Dashboard.vue';

Vue.component('NetworkCard',        NetworkCard);
Vue.component('NetworkDashboard',   NetworkDashboard);

//Notice Board
import NoticeAdmin      from './notices/Admin.vue';
import NoticeAll      from './notices/All.vue';
import NoticeSingle from './notices/Single.vue';

Vue.component('NoticeAll',        NoticeAll);
Vue.component('NoticeAdmin',      NoticeAdmin);
Vue.component('NoticeSingle',     NoticeSingle);

    import NoticeClose   from './notices/forms/Close.vue';
    import NoticeForm    from './notices/forms/New.vue';

    Vue.component('NoticeClose',     NoticeClose);
    Vue.component('NoticeForm',      NoticeForm);

//Policies Components
import PoliciesAdmin        from './policies/Admin.vue';
import PoliciesDept         from './policies/Departmental.vue';
import PoliciesGen          from './policies/General.vue';
import PoliciesView         from './policies/View.vue';

import PoliciesForm         from './policies/form/New.vue';
import PoliciesFormAssign   from './policies/form/Assign.vue';

Vue.component('PoliciesAdmin',       PoliciesAdmin);
Vue.component('PoliciesDept',        PoliciesDept);
Vue.component('PoliciesGen',         PoliciesGen);
Vue.component('PoliciesView',        PoliciesView);

Vue.component('PoliciesForm',        PoliciesForm);
Vue.component('PoliciesFormAssign',  PoliciesFormAssign);

//Profile Components
import Profile from './profile/Profile.vue';
import PMFormBioData from './profile/forms/BioData.vue';
import PMFormNOK from './profile/forms/NextOfKin.vue';
import PMFormPassword from './profile/forms/Password.vue';


Vue.component('Profile',        Profile);
Vue.component('PMFormBioData',  PMFormBioData);
Vue.component('PMFormNOK',      PMFormNOK);
Vue.component('PMFormPassword', PMFormPassword);

//Social Modules Components
import SocialAlbum from './components/socials/Album.vue';
import SocialAlbums from './components/socials/Albums.vue';
import SocialDashboard from './components/socials/Dashboard.vue';
import SocialForum from './components/socials/Forum.vue';
import SocialForums from './components/socials/Forums.vue';

Vue.component('SocialAlbum',        SocialAlbum)
Vue.component('SocialAlbums',       SocialAlbums)
Vue.component('SocialDashboard',    SocialDashboard)
Vue.component('SocialForum',        SocialForum)
Vue.component('SocialForums',       SocialForums)



//Settings Modules Components
import SOMNominate      from './som/Nominate.vue';
import SOMView          from './som/View.vue';
import SOMVote          from './som/Vote.vue';
import SOMWinners       from './som/Winners.vue';

Vue.component('SOMNominate', SOMNominate);
Vue.component('SOMView',     SOMView);
Vue.component('SOMVote',     SOMVote);
Vue.component('SOMVote',     SOMVote);


//Ticketing Module Components
import TicketAdmin      from './ticketing/Admin.vue';

import TicketDepartment from './ticketing/Department.vue';
import TicketPersonal   from './ticketing/Personal.vue';
import TicketPersonalSummary   from './ticketing/PersonalSummary.vue';
import TicketSetting     from './ticketing/Setting.vue';
import TicketSingle     from './ticketing/Single.vue';

    import TicketFormAssign     from './ticketing/forms/Assign.vue';
    import TicketFormAccept     from './ticketing/forms/Accept.vue';
    import TicketFormComplete   from './ticketing/forms/Complete.vue';
    import TicketFormNew        from './ticketing/forms/New.vue';
    import TicketFormReply      from './ticketing/forms/Reply.vue';

Vue.component('TicketAdmin',            TicketAdmin);
Vue.component('TicketDepartment',       TicketDepartment);
Vue.component('TicketPersonal',         TicketPersonal);
Vue.component('TicketPersonalSummary',  TicketPersonalSummary);
Vue.component('TicketSingle',           TicketSingle);

    Vue.component('TicketFormAccept',   TicketFormAccept);
    Vue.component('TicketFormAssign',   TicketFormAssign);
    Vue.component('TicketFormComplete', TicketFormComplete);
    Vue.component('TicketFormNew',      TicketFormNew);
    Vue.component('TicketFormReply',    TicketFormReply);

//User Modules Components
import AllRoles from './components/users/AllRoles.vue';    
import AllUsers from './components/users/AllUsers.vue';    

import UserFormAssignRole   from './components/users/forms/AssignRole.vue';    
import UserFormNOK          from './components/users/forms/NextOfKin.vue'; 
import UserFormRole         from './components/users/forms/Role.vue';    
import UserFormUser         from './components/users/forms/BioData.vue'; 

Vue.component('AllRoles',           AllRoles);
Vue.component('AllUsers',           AllUsers);
Vue.component('UserFormAssignRole', UserFormAssignRole);
Vue.component('UserFormNOK',        UserFormNOK);
Vue.component('UserFormRole',       UserFormRole);
Vue.component('UserFormUser',       UserFormUser);


let routes = [
//Applicant Module
    {path: '/app',                   component: ApplicantDashboard},
    {path: '/app/appointment/:id',   component: ApplicantAppointment},
    {path: '/app/appointments',      component: ApplicantAppointments},
    {path: '/app/dashboard',         component: ApplicantDashboard},
    {path: '/app/payments',          component: ApplicantPayments},
    {path: '/app/payment/:id',       component: ApplicantPayment},
    {path: '/app/profile',           component: ApplicantProfile},


//Dashboard Module
    {path: '/home',             component: ApplicantDashboard},
    {path: '/dashboard',        component: DashboardMain},

//Blog Module
    {path: '/stories',             component: BlogPosts},
    {path: '/stories/posts',       component: BlogPosts},
    {path: '/stories/post/:id',    component: BlogPost},

//Chats Links
    {path: '/branches',         component: BranchAll},
    {path: '/branches/:id',     component: BranchSingle},

//Chats Links
    {path: '/chats',            component: ChatMain},
    {path: '/chats/private',    component: ChatMain},

//Contact Links
    {path: '/contacts',           component:ContactAll},
    {path: '/contacts/staff/:id', component:ContactSingle},

//Department Links
    {path: '/departments',       component:DepartmentAll},
    {path: '/departments/:id',   component:DepartmentSingle},

//Notice Board Module
    {path: '/notices', component: NoticeAll},
    {path: '/notices/admin', component: NoticeAdmin},
    {path: '/notices/:id', component: NoticeSingle},
    //{path: '/notices', component: NoticeAll},

//Profile Module
    {path: '/policies',             component: PoliciesDept},
    {path: '/policies/department',  component: PoliciesDept},
    {path: '/policies/general',     component: PoliciesGen},
    {path: '/policies/admin',       component: PoliciesAdmin},
    {path: '/policies/view/:id',    component: PoliciesView},

//Socials Module
    {path: '/socials/album/:id',    component: SocialAlbum},
    {path: '/socials/albums',       component: SocialAlbums},
    {path: '/socials/dashboard',    component: SocialDashboard},
    {path: '/socials/forum/:id',    component: SocialForum},
    {path: '/socials/forums',       component: SocialForums},


//Ticketing Modules
    {path: '/ticketing',                component: TicketPersonal},
    {path: '/ticketing/admin',          component: TicketAdmin},
    {path: '/ticketing/settings',       component: TicketSetting},
    {path: '/ticketing/department',     component: TicketDepartment},
    {path: '/ticketing/:id',            component: TicketSingle},

//User Module
    {path: '/users', component: AllUsers},
    {path: '/users/all', component: AllUsers},
    {path: '/users/roles', component: AllRoles},
]
    
Vue.component('formcontact', FormContact);
Vue.component('formbiodata', FormBioData);
const router = new VueRouter({
    mode: 'history',
    routes
})

export default router