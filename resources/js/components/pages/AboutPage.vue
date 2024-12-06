<template>
    <div>
        <MobileMenu />
        <Header />
        <PageHeader />
        <About />
        <PopularChef />
        <BookingTable />
        <Sponsor />
        <NewsLetter />
        <Footer />
    </div>
</template>

<script>
import MobileMenu from "@/components/common/MobileMenu.vue";
import Header from "@/components/common/Header.vue";
import PageHeader from "@/components/about/PageHeader.vue";
import About from "@/components/about/About.vue"; 
import PopularChef from "@/components/about/PopularChef.vue"; 
import BookingTable from "@/components/about/BookingTable.vue"; 
import Sponsor from "@/components/about/Sponsor.vue"; 
import NewsLetter from "@/components/common/NewsLetter.vue"; 
import Footer from "@/components/common/Footer.vue"; 

export default {
    name: 'AboutPage',

    components: {
        MobileMenu,
        Header,
        PageHeader,
        About,  
        PopularChef,
        BookingTable,
        Sponsor,
        NewsLetter,
        Footer
    },
};
</script>
