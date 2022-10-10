import Vue from 'vue';
import VueRouter from 'vue-router';

//Home Components
import HomeContact                from './home/Contact.vue';
import HomeFooter                 from './home/Footer.vue';
import HomeWelcome                from './home/Welcome.vue';

Vue.component('HomeContact',            HomeContact);
Vue.component('HomeFooter',             HomeFooter);
Vue.component('HomeWelcome',            HomeWelcome);

//Applicant Component
import ApplicantAppointment       from './applicants/Appointment.vue';
import ApplicantAppointments      from './applicants/Appointments.vue';
import ApplicantDashboard         from './applicants/Dashboard.vue';
import ApplicantPayment           from './applicants/Payment.vue';
import ApplicantPayments          from './applicants/Payments.vue';
import ApplicantProfile           from './applicants/Profile.vue';
import ApplicantStories           from './applicants/Stories.vue';
import ApplicantStory             from './applicants/Story.vue';

    import ApplicantDetailsForm         from './applicants/forms/Details.vue';
    import ApplicantAppointmentForm     from './applicants/forms/Appointment.vue';
    import ApplicantPaymentForm         from './applicants/forms/Payment.vue';

Vue.component('ApplicantAppointment',          ApplicantAppointment);
Vue.component('ApplicantAppointments',         ApplicantAppointments);
Vue.component('ApplicantDashboard',            ApplicantDashboard);
Vue.component('ApplicantPayment',              ApplicantPayment);
Vue.component('ApplicantPayments',             ApplicantPayments);
Vue.component('ApplicantProfile',              ApplicantProfile);
Vue.component('ApplicantStories',              ApplicantStories);
Vue.component('ApplicantStory',                ApplicantStory);
    
    Vue.component('ApplicantDetailsForm',      ApplicantDetailsForm);
    Vue.component('ApplicantAppointmentForm',  ApplicantAppointmentForm);
    Vue.component('ApplicantPaymentForm',      ApplicantPaymentForm);

//Applicant Component
import ApprovalAgencies         from './approvals/Agencies.vue';
import ApprovalDoctors          from './approvals/Doctors.vue';
import ApprovalHospitals        from './approvals/Hospitals.vue';
import ApprovalStories          from './approvals/Stories.vue';

Vue.component('ApprovalAgencies',      ApprovalAgencies);
Vue.component('ApprovalDoctors',      ApprovalDoctors);
Vue.component('ApprovalHospitals',      ApprovalHospitals);
Vue.component('ApprovalStories',      ApprovalStories);

//Blog Components
import BlogHomePage     from './blog/HomePage.vue';
import BlogPosts        from './blog/Posts.vue';
import BlogPost         from './blog/Post.vue';
import BlogPostDetail   from './blog/PostDetail.vue';
import BlogSidebar      from './blog/Sidebar.vue';
    import BlogFormPost from './blog/forms/Post.vue';
    
Vue.component('BlogHomePage',      BlogHomePage);
Vue.component('BlogPost',          BlogPost);
Vue.component('BlogPostDetail',    BlogPostDetail);
Vue.component('BlogPosts',         BlogPosts);
Vue.component('BlogSidebar',       BlogSidebar);

    Vue.component('BlogFormPost',       BlogFormPost);

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
import FormSecurity from './components/partials/forms/Security.vue';


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


//Notice Board
import NoticeAdmin      from './notices/Admin.vue';
import NoticeAll        from './notices/All.vue';
import NoticeSingle     from './notices/Single.vue';

Vue.component('NoticeAll',        NoticeAll);
Vue.component('NoticeAdmin',      NoticeAdmin);
Vue.component('NoticeSingle',     NoticeSingle);

    import NoticeClose   from './notices/forms/Close.vue';
    import NoticeForm    from './notices/forms/New.vue';

    Vue.component('NoticeClose',     NoticeClose);
    Vue.component('NoticeForm',      NoticeForm);

//Pharmacy Components
import PharmacyMain         from './pharmacy/Main.vue';
Vue.component('PharmacyMain',     PharmacyMain);

    import PharmacyFormNew  from './pharmacy/forms/New.vue';
    import PharmacyFormSearch from './pharmacy/forms/Search.vue';

    Vue.component('PharmacyFormNew',     PharmacyFormNew);
    Vue.component('PharmacyFormSearch',  PharmacyFormSearch);

//Profile Components
import Profile from './profile/Profile.vue';
import PMFormBioData from './profile/forms/BioData.vue';
import PMFormNOK from './profile/forms/NextOfKin.vue';
import PMFormPassword from './profile/forms/Password.vue';

Vue.component('Profile',        Profile);
Vue.component('PMFormBioData',  PMFormBioData);
Vue.component('PMFormNOK',      PMFormNOK);
Vue.component('PMFormPassword', PMFormPassword);


//Profile Components

import StaffDashboard       from './staff/Dashboard.vue';
import StaffPendAgencies    from './staff/PendAgencies.vue';
import StaffPendProviders   from './staff/PendProviders.vue';
import StaffPendStories     from './staff/PendStories.vue';
import StaffUsers           from './staff/Users.vue';
import StaffUserNew         from './staff/UserNew.vue';

Vue.component('StaffDashboard',     StaffDashboard);
Vue.component('StaffPendAgencies',  StaffPendAgencies);
Vue.component('StaffPendProviders', StaffPendProviders);
Vue.component('StaffPendStories',   StaffPendAgencies);
Vue.component('StaffUsers',         StaffUsers);
Vue.component('StaffUserNew',       StaffUserNew);

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
import AllRoles from './users/AllRoles.vue';    
import AllUsers from './users/AllUsers.vue';    

import UserFormAssignRole   from './users/forms/AssignRole.vue';    
import UserFormNOK          from './users/forms/NextOfKin.vue'; 
import UserFormRole         from './users/forms/Role.vue';    
import UserFormUser         from './users/forms/BioData.vue'; 

import UserCardHeader       from './users/CardHeader.vue';

Vue.component('AllRoles',           AllRoles);
Vue.component('AllUsers',           AllUsers);
Vue.component('UserFormAssignRole', UserFormAssignRole);
Vue.component('UserFormNOK',        UserFormNOK);
Vue.component('UserFormRole',       UserFormRole);
Vue.component('UserFormUser',       UserFormUser);

Vue.component('UserCardHeader', UserCardHeader)


let routes = [
    {path: '/',                      component: HomeWelcome},
    {path: '/contact',               component: HomeContact},
//Applicant Module
    {path: '/app',                   component: ApplicantDashboard},
    {path: '/app/appointment/:id',   component: ApplicantAppointment},
    {path: '/app/appointments',      component: ApplicantAppointments},
    {path: '/app/dashboard',         component: ApplicantDashboard},
    //{path: '/app/wallets',           component: ApplicantWallet},
    {path: '/app/payment/:id',       component: ApplicantPayment},
    {path: '/app/stories',           component: ApplicantStories},
    {path: '/app/stories/:id',       component: ApplicantStory},
    {path: '/app/profile',           component: ApplicantProfile},

//Staff Module
    {path: '/staffs',                 component: StaffDashboard},
    {path: '/staffs/dashboard',       component: StaffDashboard},
    {path: '/staffs/stories',         component: StaffDashboard},
    {path: '/staffs/users',           component: StaffUsers},
    {path: '/staffs/users/new',       component: StaffUserNew},
    {path: '/staffs/users/roles',     component: AllRoles},
    {path: '/staffs/pend/agencies',   component: StaffPendAgencies},
    {path: '/staffs/pend/providers',  component: StaffPendProviders},
    {path: '/staffs/pend/stories',    component: StaffPendStories},
    
//Dashboard Module
    {path: '/home',             component: ApplicantDashboard},
    {path: '/dashboard',        component: DashboardMain},

//Blog Module
    {path: '/stories',             component: BlogPosts},
    {path: '/stories/posts',       component: BlogPosts},
    {path: '/stories/post/:id',    component: BlogPost},

//Chats Links
    {path: '/chats',            component: ChatMain},
    {path: '/chats/private',    component: ChatMain},

//Contact Links
    {path: '/contacts',           component:ContactAll},
    {path: '/contacts/staff/:id', component:ContactSingle},

//Pharmacy Module
    {path: '/pharmacy',             component: PharmacyMain},

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