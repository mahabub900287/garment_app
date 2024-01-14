<script setup>
import { Head, Link, usePage } from "@inertiajs/vue3";
import Helper from "../../helper.js";
import { onMounted, ref } from "vue";

//menu mega menu active
const activeCategoryIndex = ref(0); // Default active category index
const activeStoreId = ref(null); // Default active store ID

const setActiveCategory = (index) => {
    activeCategoryIndex.value = index;
    activeStoreId.value = null; // Reset active store when changing category
};

const setActiveStore = (storeId) => {
    activeStoreId.value = storeId;
};

const isRouteActive = window.location.pathname;

onMounted(() => {
    $("#menu").metisMenu();
    $(".ic-mobile-menu-open,.ic-mobile-menu-overlay").on("click", function () {
        $(".ic-mobile-menu-warper,.ic-mobile-menu-overlay").addClass("active");
    });

    $(".ic-menu-close,.ic-mobile-menu-overlay").on("click", function () {
        $(".ic-mobile-menu-warper,.ic-mobile-menu-overlay").removeClass(
            "active"
        );
    });
    $(".ic-shop-by-categories-link").on("click", function () {
        $(".shop-by-categories-dropdown").slideToggle("slow");
    });
    $(".ic-user-profile-btn").on("click", function () {
        $(".ic-user-dropdown").toggleClass("active");
    });
    $(".mega-link").hover(function () {
        handleOnHover($(this));
    });
    function handleOnHover(element) {
        $(".mega-link").removeClass("active");
        element.addClass("active");
        const id = element.attr("data-link");
        $(".ic-mega-menu-items").hide();
        $(`#${id}`).show();
    }
});
</script>
<script>
import axios from "axios"; // You'll need Axios or another HTTP library

export default {
    data() {
        return {
            searchTerm: "",
            searchResultsVisible: false,
            previousSearchTerm: "",
            blogResults: [],
            categoryResults: [],
            storeResults: [],
        };
    },
    watch: {
        searchTerm: function (newTerm) {
            // Check if the search term is empty
            if (newTerm.trim() === "") {
                // Clear the results if the search term is empty
                this.blogResults = [];
                this.categoryResults = [];
                this.storeResults = [];
            } else if (newTerm !== this.previousSearchTerm) {
                // Only perform a new search if the search term has changed
                this.previousSearchTerm = newTerm;
                this.performSearch(newTerm);
            }
        },
    },
    methods: {
        async performSearch(keyword) {
            try {
                const response = await axios.get("/api/search", {
                    params: { keyword },
                });
                this.blogResults = response.data.blogResults;
                this.categoryResults = response.data.categoryResults;
                this.storeResults = response.data.storeResults;
            } catch (error) {
                console.error("Error performing search:", error);
            }
        },
        toggleSearchResults() {
            this.searchResultsVisible = !this.searchResultsVisible;
            if (!this.searchResultsVisible) {
                this.searchTerm = ""; // Clear the search term when closing
            }
        },
        // handlePageClick(event) {
        //     if (!this.$el.contains(event.target)) {
        //         this.searchResultsVisible = false;
        //     }
        // },
        handleSearchInput() {
            if (this.searchTerm) {
                this.searchResultsVisible = true;
            } else {
                this.searchResultsVisible = false;
            }
        },
    },
    mounted() {
        const vm = this;

        // Toggle search results card on clicking the search icon
        $(".ic-header-search button").click(function (event) {
            event.stopPropagation();
            var $searchResultsCard = $(this)
                .closest(".ic-header-search")
                .find(".search-results-card");
            if ($searchResultsCard.is(":visible")) {
                $searchResultsCard.slideUp("fast");
            } else {
                $searchResultsCard.slideDown("fast");
            }
        });

        // Hide card when clicking outside the search area
        $(document).on("click", function (event) {
            var $headerSearch = $(".ic-header-search");
            if (
                !$headerSearch.is(event.target) &&
                $headerSearch.has(event.target).length === 0
            ) {
                $(".search-results-card").slideUp("fast");
                vm.toggleSearchResults(); // Call the method in the Vue instance
            }
        });
    },
};
</script>

<template>
    <Head>
        <link
            rel="icon"
            :href="'/assets/front/images/logo/brand-favicon.png'"
            type="image/svg+xml"
        />
    </Head>
    <!--Header Start-->
    <div class="ic-productOffers">
        <div class="container text-center">
            <p>
                Stars, Stripes & Savings
                <a href="#" class="offer-btn">Shop Deals Up To 60% Off</a>
            </p>
        </div>
    </div>
    <header class="ic-header-area">
        <div class="ic-mobile-menu-overlay"></div>
        <div class="container">
            <div class="ic-header-wraper">
                <div class="ic-header-brand">
                    <Link :href="route('front.home')">
                        <img
                            :src="'/assets/front/images/logo/main-logo.png'"
                            class="img-fluid"
                            alt="logo"
                        />
                    </Link>
                </div>
                <div class="ic-header-search">
                    <div class="position-relative">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Search your favorite product..."
                        />
                        <button><i class="ri-search-line"></i></button>
                    </div>
                </div>
                <div
                    class="dropdown ic-user-profile"
                    v-if="$page.props.auth.user"
                >
                    <button
                        class="dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <img
                            class="rounded-circle"
                            :src="
                                $page.props.auth.user.avatar != null
                                    ? '/storage/user/' +
                                      $page.props.auth.user.avatar
                                    : '/images/user_default.png'
                            "
                            id="userImg"
                            alt="user image"
                        />
                        <span>{{ $page.props.auth.user.username }}</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <Link
                                v-if="
                                    $page.props.auth.user &&
                                    $page.props.auth.user.type == 'user'
                                "
                                :href="route('user.home')"
                                ><i class="ri-user-line"></i>Profile</Link
                            >
                            <Link
                                v-if="
                                    $page.props.auth.user &&
                                    $page.props.auth.user.type == 'admin'
                                "
                                :href="route('admin.login')"
                                ><i class="ri-user-line"></i>Profile</Link
                            >
                        </li>
                        <li>
                            <Link :href="route('front.community')"
                                ><i class="ri-message-2-line"></i>Messages</Link
                            >
                        </li>
                        <li>
                            <Link href="/logout" method="post">
                                <i class="ri-logout-box-r-line"></i>Logout</Link
                            >
                        </li>
                    </ul>
                </div>
                <div class="ic-right-cart" v-if="!$page.props.auth.user">
                    <Link v-if="!$page.props.auth.user" :href="route('login')">
                        <svg
                            width="20"
                            height="19"
                            viewBox="0 0 20 19"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M7.5 12.5152C11.5668 12.5152 15 13.1844 15 15.7687C15 18.3531 11.5448 19 7.5 19C3.4332 19 0 18.3298 0 15.7464C0 13.1621 3.45422 12.5152 7.5 12.5152ZM16.999 5C17.4952 5 17.8979 5.40945 17.8979 5.91162V7.08786H19.101C19.5962 7.08786 20 7.49731 20 7.99948C20 8.50165 19.5962 8.9111 19.101 8.9111H17.8979V10.0884C17.8979 10.5906 17.4952 11 16.999 11C16.5038 11 16.1 10.5906 16.1 10.0884V8.9111H14.899C14.4027 8.9111 14 8.50165 14 7.99948C14 7.49731 14.4027 7.08786 14.899 7.08786H16.1V5.91162C16.1 5.40945 16.5038 5 16.999 5ZM7.5 0C10.2546 0 12.4626 2.23663 12.4626 5.02684C12.4626 7.81705 10.2546 10.0537 7.5 10.0537C4.74543 10.0537 2.53737 7.81705 2.53737 5.02684C2.53737 2.23663 4.74543 0 7.5 0Z"
                                fill="#667085"
                            />
                        </svg>
                        <span class="ic__mobile__text--delete ic-login-text"
                            >Login</span
                        >
                    </Link>
                    <Link
                        v-if="!$page.props.auth.user"
                        :href="route('register')"
                    >
                        <span class="ic__mobile__text--delete ic-login-text"
                            >Signup</span
                        >
                    </Link>

                    <!-- <button class="ic-cart">
                        <span class="cart-count">10</span>
                        <svg
                            width="31"
                            height="21"
                            viewBox="0 0 31 21"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M29.8905 6.1519C29.9122 5.82435 29.9344 5.48818 29.9573 5.14369C29.9751 5.15871 29.9921 5.17462 30.0084 5.19132C30.14 5.3261 30.2498 5.53626 30.3314 5.81671C30.4963 6.38321 30.5 7.06296 30.5 7.49095C30.5 7.87876 30.3623 9.43172 30.2191 10.9308C30.1484 11.6708 30.0776 12.3848 30.0246 12.914C29.9981 13.1785 29.976 13.3968 29.9605 13.5489L29.9425 13.7249L29.9378 13.771L29.9372 13.7774C29.8546 14.3566 29.6 15.0269 29.2285 15.5425C28.8486 16.0698 28.4172 16.3454 28 16.3454H5.60242C4.95129 16.1901 4.49192 15.8953 4.17975 15.4864C3.85476 15.0606 3.65341 14.4639 3.61475 13.6585L3.61433 13.6498L3.61362 13.6413L2.67415 2.27234L2.64238 1.88789L2.26244 1.82108L0.721852 1.55016C0.721693 1.55013 0.721534 1.5501 0.721376 1.55008C0.586643 1.5257 0.478211 1.37915 0.50379 1.22989L0.504093 1.22808C0.530094 1.07293 0.673578 0.971477 0.82396 0.994156C0.824064 0.994172 0.824168 0.994188 0.824273 0.994204L3.24996 1.36711C3.3636 1.39032 3.45764 1.48838 3.46979 1.62585C3.46981 1.62607 3.46983 1.62629 3.46985 1.62651L3.66335 3.95637C3.88163 7.34948 4.0548 9.64249 4.21728 11.1979C4.37768 12.7335 4.532 13.607 4.73479 14.1155C4.9855 14.744 5.52187 15.0337 5.9236 15.1651C6.12864 15.2322 6.31744 15.265 6.45424 15.2813C6.52328 15.2896 6.58081 15.2939 6.62269 15.2961C6.64368 15.2972 6.66087 15.2978 6.67376 15.2981L6.68986 15.2984L6.6954 15.2984L6.69753 15.2984L6.69843 15.2984L6.69884 15.2984C6.69903 15.2984 6.69922 15.2984 6.69922 14.7984C6.69922 15.2984 6.69929 15.2984 6.69944 15.2984H6.7001H6.7012H6.70273H6.7047H6.7071H6.70993H6.7132H6.71689H6.721H6.72554H6.73051H6.73589H6.74169H6.74792H6.75455H6.76161H6.76907H6.77695H6.78523H6.79393H6.80303H6.81253H6.82243H6.83274H6.84345H6.85455H6.86605H6.87795H6.89023H6.90291H6.91598H6.92943H6.94327H6.9575H6.97211H6.98709H7.00246H7.01821H7.03433H7.05082H7.06769H7.08493H7.10253H7.12051H7.13885H7.15755H7.17662H7.19605H7.21583H7.23598H7.25648H7.27733H7.29853H7.32009H7.342H7.36425H7.38685H7.40979H7.43307H7.4567H7.48066H7.50496H7.5296H7.55457H7.57987H7.60551H7.63147H7.65776H7.68437H7.71131H7.73857H7.76615H7.79405H7.82227H7.8508H7.87965H7.90881H7.93828H7.96805H7.99814H8.02853H8.05922H8.09022H8.12151H8.15311H8.185H8.21718H8.24966H8.28244H8.3155H8.34885H8.38249H8.41641H8.45062H8.4851H8.51987H8.55492H8.59024H8.62584H8.66171H8.69786H8.73427H8.77096H8.8079H8.84512H8.8826H8.92034H8.95834H8.99659H9.03511H9.07388H9.1129H9.15217H9.1917H9.23147H9.27149H9.31176H9.35226H9.39301H9.434H9.47523H9.51669H9.55839H9.60032H9.64249H9.68488H9.7275H9.77035H9.81342H9.85672H9.90024H9.94397H9.98793H10.0321H10.0765H10.1211H10.1659H10.2109H10.2561H10.3016H10.3472H10.3931H10.4391H10.4853H10.5318H10.5784H10.6253H10.6723H10.7195H10.7669H10.8145H10.8623H10.9102H10.9584H11.0067H11.0552H11.1039H11.1528H11.2018H11.251H11.3004H11.35H11.3997H11.4496H11.4996H11.5498H11.6002H11.6507H11.7014H11.7522H11.8032H11.8544H11.9057H11.9572H12.0088H12.0605H12.1124H12.1644H12.2166H12.2689H12.3214H12.3739H12.4267H12.4795H12.5325H12.5856H12.6388H12.6922H12.7457H12.7993H12.853H12.9069H12.9609H13.015H13.0692H13.1235H13.1779H13.2324H13.2871H13.3418H13.3967H13.4516H13.5067H13.5618H13.6171H13.6724H13.7278H13.7834H13.839H13.8947H13.9505H14.0064H14.0623H14.1184H14.1745H14.2307H14.287H14.3434H14.3998H14.4563H14.5129H14.5695H14.6262H14.683H14.7398H14.7968H14.8537H14.9107H14.9678H15.0249H15.0821H15.1394H15.1967H15.254H15.3114H15.3688H15.4263H15.4838H15.5414H15.599H15.6566H15.7143H15.772H15.8297H15.8875H15.9452H16.0031H16.0609H16.1188H16.1767H16.2346H16.2925H16.3504H16.4084H16.4664H16.5244H16.5823H16.6404H16.6984H16.7564H16.8144H16.8724H16.9304H16.9884H17.0465H17.1045H17.1625H17.2205H17.2784H17.3364H17.3944H17.4523H17.5102H17.5681H17.626H17.6839H17.7417H17.7996H17.8573H17.9151H17.9728H18.0305H18.0882H18.1458H18.2034H18.261H18.3185H18.376H18.4334H18.4908H18.5481H18.6054H18.6626H18.7198H18.7769H18.834H18.891H18.948H19.0049H19.0617H19.1185H19.1752H19.2319H19.2884H19.3449H19.4014H19.4577H19.514H19.5702H19.6263H19.6824H19.7383H19.7942H19.85H19.9057H19.9613H20.0168H20.0723H20.1276H20.1828H20.238H20.293H20.348H20.4028H20.4576H20.5122H20.5667H20.6211H20.6754H20.7296H20.7837H20.8377H20.8915H20.9452H20.9988H21.0523H21.1057H21.1589H21.212H21.265H21.3178H21.3706H21.4231H21.4756H21.5279H21.58H21.6321H21.6839H21.7357H21.7873H21.8387H21.89H21.9412H21.9921H22.043H22.0937H22.1442H22.1945H22.2447H22.2948H22.3447H22.3944H22.4439H22.4933H22.5425H22.5915H22.6403H22.689H22.7375H22.7858H22.834H22.8819H22.9297H22.9773H23.0247H23.0719H23.1189H23.1657H23.2123H23.2588H23.305H23.351H23.3969H23.4425H23.4879H23.5331H23.5781H23.6229H23.6675H23.7119H23.7561H23.8H23.8437H23.8872H23.9305H23.9736H24.0164H24.059H24.1014H24.1435H24.1855H24.2271H24.2686H24.3098H24.3508H24.3915H24.432H24.4723H24.5123H24.552H24.5915H24.6308H24.6698H24.7085H24.747H24.7853H24.8233H24.861H24.8985H24.9357H24.9726H25.0093H25.0457H25.0818H25.1176H25.1532H25.1885H25.2236H25.2583H25.2928H25.327H25.3609H25.3945H25.4278H25.4609H25.4936H25.5261H25.5583H25.5901H25.6217H25.653H25.684H25.7146H25.745H25.7751H25.8048H25.8343H25.8634H25.8923H25.9208H25.949H25.9768H26.0044H26.0316H26.0586H26.0852H26.1114H26.1374H26.163H26.1883H26.2132H26.2378H26.2621H26.2861H26.3097H26.3329H26.3559H26.3784H26.4007H26.4225H26.4441H26.4653H26.4861H26.5066H26.5267H26.5465H26.5659H26.5849H26.6036H26.6219H26.6399H26.6575H26.6747H26.6915H26.708H26.7241H26.7398H26.7552H26.7701H26.7847H26.7989H26.8127H26.8262H26.8392H26.8518H26.8641H26.876H26.8875H26.8985H26.9092H26.9195H26.9294H26.9389H26.9479H26.9566H26.9649H26.9727H26.9802H26.9872H26.9938H27C27.7096 15.2984 28.2097 14.9081 28.5074 14.5721C28.6584 14.4017 28.7689 14.2333 28.8417 14.108C28.8784 14.0448 28.9063 13.9911 28.9258 13.9517C28.9355 13.932 28.9432 13.9157 28.9488 13.9035L28.9523 13.8958C29.1118 13.5721 29.2256 13.1189 29.3179 12.589C29.4131 12.0424 29.4926 11.3688 29.5655 10.5847C29.6774 9.37973 29.776 7.88681 29.8905 6.1519ZM5.5455 18.2702C6.10492 18.2702 6.58746 18.7433 6.58746 19.3554C6.58746 19.9549 6.10704 20.4302 5.5455 20.4302C4.97161 20.4302 4.49332 19.9527 4.49332 19.3554C4.49332 18.7455 4.97374 18.2702 5.5455 18.2702ZM28.0336 18.2702C28.5931 18.2702 29.0756 18.7433 29.0756 19.3554C29.0756 19.9549 28.5952 20.4302 28.0336 20.4302C27.4598 20.4302 26.9815 19.9527 26.9815 19.3554C26.9815 18.7455 27.4619 18.2702 28.0336 18.2702Z"
                                fill="#FCFCFD"
                                stroke="#FCFCFD"
                            />
                        </svg>
                        <span class="ic__mobile__text--delete ic-cart-text"
                            >Cart</span
                        >
                    </button> -->
                </div>
            </div>
        </div>
        <div class="ic-bottom-headers">
            <div class="container">
                <div class="ic-bottom-headers-main-parts">
                    <div class="ic-shop-by-categories">
                        <a href="#" class="ic-shop-by-categories-link"
                            >Shop By Categories
                            <i class="ri-arrow-down-s-line"></i
                        ></a>
                        <ul class="shop-by-categories-dropdown">
                            <li
                                v-for="(category, index) in categories"
                                :key="index"
                            >
                                <Link
                                    :href="
                                        route('front.single-category', {
                                            slug: category.slug,
                                        })
                                    "
                                    ><img
                                        class="img-fluid"
                                        :src="
                                            Helper.getStorageImage(
                                                'coupon-category',
                                                category.icon_image
                                            )
                                        "
                                        alt="img"
                                    />
                                    {{ category.name }}</Link
                                >
                            </li>
                            <!-- all categories -->
                            <li>
                                <Link
                                    href="
                                       
                                    "
                                    >All Categories</Link
                                >
                            </li>
                        </ul>
                    </div>
                    <div class="ic-navbar-wraper">
                        <nav class="ic-navbar ic-mobile-menu-warper">
                            <div class="ic-mobile-logo-close">
                                <div class="logo">
                                    <img
                                        :src="'/assets/front/images/logo/logo.png'"
                                        class="img-fluid"
                                        alt="logo"
                                    />
                                </div>
                                <a href="#" class="ic-menu-close">
                                    <i class="ri-close-line"></i>
                                </a>
                            </div>
                            <ul class="ic-navbar-nav" id="menu">
                                <li class="ic-nav-item">
                                    <Link
                                        :href="route('front.home')"
                                        class="ic-nav-link"
                                        :class="{
                                            active: isRouteActive == '/',
                                        }"
                                        >Home</Link
                                    >
                                </li>
                                <li class="ic-nav-item">
                                    <Link
                                        :href="route('front.top-deals')"
                                        class="ic-nav-link"
                                        :class="{
                                            active:
                                                isRouteActive == '/top-deals',
                                        }"
                                        >Top Deals</Link
                                    >
                                </li>
                                <li class="ic-nav-item">
                                    <Link
                                        :href="route('front.cashback')"
                                        class="ic-nav-link"
                                        :class="{
                                            active:
                                                isRouteActive == '/cash-back',
                                        }"
                                        >Cash Back</Link
                                    >
                                </li>
                                <li class="ic-nav-item">
                                    <Link href="" class="ic-nav-link"
                                        >Blog</Link
                                    >
                                </li>
                                <li class="ic-nav-item">
                                    <Link
                                        :href="route('front.contact')"
                                        class="ic-nav-link"
                                        aria-expanded="false"
                                        :class="{
                                            active:
                                                isRouteActive == '/contact-us',
                                        }"
                                        >Contact Us</Link
                                    >
                                </li>
                            </ul>
                        </nav>
                        <div class="ic-navbar-login-reg">
                            <div class="ic-mobile-menu-icon">
                                <a
                                    href="javascript:void(0)"
                                    class="ic-mobile-menu-open"
                                >
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <ul class="ic-navbar-nav ic-larged-device">
                        <li class="ic-nav-item">
                            <Link
                                :href="route('front.top-deals')"
                                class="ic-nav-link"
                                :class="{
                                    active: isRouteActive == '/top-deals',
                                }"
                                >Top Deals</Link
                            >
                        </li>
                        <li class="ic-nav-item">
                            <Link
                                :href="route('front.coupons')"
                                class="ic-nav-link"
                                :class="{
                                    active: isRouteActive == '/all-coupons',
                                }"
                                >Coupons</Link
                            >
                        </li>
                        <li class="ic-nav-item">
                            <a href="#" class="ic-nav-link"
                                >Stores <i class="ri-arrow-down-s-line"></i
                            ></a>
                            <div class="ic-dropdown-nav">
                                <ul class="ic-category-menu">
                                    <li class="ic-category-item">
                                        <Link
                                            class="ic-category-link"
                                            :href="
                                                route('front.single-category', {
                                                    slug: 'test',
                                                })
                                            "
                                            >Men's Outerwear</Link
                                        >
                                        <ul class="ic-mega-category">
                                            <li class="ic-mega-item">
                                                <Link
                                                    class="ic-mega-link"
                                                    :href="
                                                        route(
                                                            'front.single-category',
                                                            {
                                                                slug: 'test',
                                                            }
                                                        )
                                                    "
                                                    >1000farmacie</Link
                                                >
                                            </li>
                                            <li class="ic-mega-item">
                                                <Link
                                                    class="ic-mega-link"
                                                    :href="
                                                        route(
                                                            'front.single-category',
                                                            {
                                                                slug: 'test',
                                                            }
                                                        )
                                                    "
                                                    >Amazon</Link
                                                >
                                            </li>
                                            <li class="ic-mega-item">
                                                <Link
                                                    class="ic-mega-link"
                                                    :href="
                                                        route(
                                                            'front.single-category',
                                                            {
                                                                slug: 'test',
                                                            }
                                                        )
                                                    "
                                                    >BestVetCare</Link
                                                >
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="ic-category-item">
                                        <Link
                                            class="ic-category-link"
                                            :href="
                                                route('front.single-category', {
                                                    slug: 'test',
                                                })
                                            "
                                            >Department Store</Link
                                        >
                                        <ul class="ic-mega-category">
                                            <li class="ic-mega-item">
                                                <Link
                                                    class="ic-mega-link"
                                                    :href="
                                                        route(
                                                            'front.single-category',
                                                            {
                                                                slug: 'test',
                                                            }
                                                        )
                                                    "
                                                    >1800lighting</Link
                                                >
                                            </li>
                                            <li class="ic-mega-item">
                                                <Link
                                                    class="ic-mega-link"
                                                    :href="
                                                        route(
                                                            'front.single-category',
                                                            {
                                                                slug: 'test',
                                                            }
                                                        )
                                                    "
                                                    >Canadapetcare</Link
                                                >
                                            </li>
                                            <li class="ic-mega-item">
                                                <Link
                                                    class="ic-mega-link"
                                                    :href="
                                                        route(
                                                            'front.single-category',
                                                            {
                                                                slug: 'test',
                                                            }
                                                        )
                                                    "
                                                    >Zwilling</Link
                                                >
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="ic-category-item">
                                        <Link
                                            class="ic-category-link"
                                            :href="
                                                route('front.single-category', {
                                                    slug: 'test',
                                                })
                                            "
                                            >Electronic Components & Home
                                            Audio</Link
                                        >
                                        <ul class="ic-mega-category">
                                            <li class="ic-mega-item">
                                                <Link
                                                    class="ic-mega-link"
                                                    :href="
                                                        route(
                                                            'front.single-category',
                                                            {
                                                                slug: 'test',
                                                            }
                                                        )
                                                    "
                                                    >Amazon</Link
                                                >
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="ic-category-item">
                                        <Link
                                            class="ic-category-link"
                                            :href="
                                                route('front.single-category', {
                                                    slug: 'test',
                                                })
                                            "
                                            >Home Appliances</Link
                                        >
                                        <ul class="ic-mega-category">
                                            <li class="ic-mega-item">
                                                <Link
                                                    class="ic-mega-link"
                                                    :href="
                                                        route(
                                                            'front.single-category',
                                                            {
                                                                slug: 'test',
                                                            }
                                                        )
                                                    "
                                                    >Dreo</Link
                                                >
                                            </li>
                                            <li class="ic-mega-item">
                                                <Link
                                                    class="ic-mega-link"
                                                    :href="
                                                        route(
                                                            'front.single-category',
                                                            {
                                                                slug: 'test',
                                                            }
                                                        )
                                                    "
                                                    >Switch-bot</Link
                                                >
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="ic-category-item">
                                        <Link
                                            class="ic-category-link"
                                            :href="
                                                route('front.single-category', {
                                                    slug: 'test',
                                                })
                                            "
                                            >Home Improvement</Link
                                        >
                                        <ul class="ic-mega-category">
                                            <li class="ic-mega-item">
                                                <Link
                                                    class="ic-mega-link"
                                                    :href="
                                                        route(
                                                            'front.single-category',
                                                            {
                                                                slug: 'test',
                                                            }
                                                        )
                                                    "
                                                    >Amzon</Link
                                                >
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="ic-category-item">
                                        <Link
                                            class="ic-category-link"
                                            :href="
                                                route('front.single-category', {
                                                    slug: 'test',
                                                })
                                            "
                                            >Men's Outerwear</Link
                                        >
                                        <ul class="ic-mega-category">
                                            <li class="ic-mega-item">
                                                <Link
                                                    class="ic-mega-link"
                                                    :href="
                                                        route(
                                                            'front.single-category',
                                                            {
                                                                slug: 'test',
                                                            }
                                                        )
                                                    "
                                                    >11degrees</Link
                                                >
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="ic-category-item">
                                        <Link
                                            class="ic-category-link"
                                            :href="
                                                route('front.single-category', {
                                                    slug: 'test',
                                                })
                                            "
                                            >Mobile Phone Accessories</Link
                                        >
                                        <ul class="ic-mega-category">
                                            <li class="ic-mega-item">
                                                <Link
                                                    class="ic-mega-link"
                                                    :href="
                                                        route(
                                                            'front.single-category',
                                                            {
                                                                slug: 'test',
                                                            }
                                                        )
                                                    "
                                                    >1pmobile</Link
                                                >
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="ic-category-item">
                                        <Link
                                            class="ic-category-link"
                                            :href="
                                                route('front.single-category', {
                                                    slug: 'test',
                                                })
                                            "
                                            >Pets</Link
                                        >
                                        <ul class="ic-mega-category">
                                            <li class="ic-mega-item">
                                                <Link
                                                    class="ic-mega-link"
                                                    :href="
                                                        route(
                                                            'front.single-category',
                                                            {
                                                                slug: 'test',
                                                            }
                                                        )
                                                    "
                                                    >BestVetCare</Link
                                                >
                                            </li>
                                            <li class="ic-mega-item">
                                                <Link
                                                    class="ic-mega-link"
                                                    :href="
                                                        route(
                                                            'front.single-category',
                                                            {
                                                                slug: 'test',
                                                            }
                                                        )
                                                    "
                                                    >Canadapetcare</Link
                                                >
                                            </li>
                                            <li class="ic-mega-item">
                                                <Link
                                                    class="ic-mega-link"
                                                    :href="
                                                        route(
                                                            'front.single-category',
                                                            {
                                                                slug: 'test',
                                                            }
                                                        )
                                                    "
                                                    >Zooplus</Link
                                                >
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="ic-nav-item">
                            <Link
                                :href="route('front.cashback')"
                                class="ic-nav-link"
                                :class="{
                                    active: isRouteActive == '/cash-back',
                                }"
                                >Cash Back Offer</Link
                            >
                        </li>
                        <li class="ic-nav-item">
                            <Link
                                :href="route('front.blog')"
                                class="ic-nav-link"
                                :class="{
                                    active: isRouteActive == '/blog',
                                }"
                                >Blog</Link
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--Header End-->
</template>
