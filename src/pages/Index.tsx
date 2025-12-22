import Layout from "@/components/layout/Layout";
import Hero from "@/components/home/Hero";
import ValueProps from "@/components/home/ValueProps";
import GrowthJourney from "@/components/home/GrowthJourney";
import Testimonials from "@/components/home/Testimonials";
import CTASection from "@/components/home/CTASection";

const Index = () => {
  return (
    <Layout>
      <Hero />
      <ValueProps />
      <GrowthJourney />
      <Testimonials />
      <CTASection />
    </Layout>
  );
};

export default Index;
