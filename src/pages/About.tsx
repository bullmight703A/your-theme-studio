import Layout from "@/components/layout/Layout";
import { Button } from "@/components/ui/button";
import { Link } from "react-router-dom";
import { Heart, BookOpen, Users, Award, Star, ArrowRight, CheckCircle2 } from "lucide-react";

const values = [
  {
    icon: Heart,
    title: "Love & Nurturing",
    description: "Every child deserves to feel loved, safe, and valued. We create warm, supportive environments where children thrive emotionally."
  },
  {
    icon: BookOpen,
    title: "Excellence in Education",
    description: "Our research-based curriculum fosters critical thinking, creativity, and a lifelong love of learning."
  },
  {
    icon: Users,
    title: "Family Partnership",
    description: "We believe parents are a child's first teachers. We work hand-in-hand with families to support each child's unique journey."
  },
  {
    icon: Award,
    title: "Quality & Safety",
    description: "From accredited programs to rigorous safety protocols, we maintain the highest standards in everything we do."
  }
];

const milestones = [
  { year: "2008", event: "KIDazzle Academy founded with a vision of excellence in early childhood education" },
  { year: "2012", event: "Achieved Quality Rated status recognizing our commitment to quality care" },
  { year: "2016", event: "Expanded to multiple locations to serve more families in our community" },
  { year: "2020", event: "Launched innovative curriculum blending traditional learning with modern approaches" },
  { year: "2024", event: "Continuing to grow while maintaining our family-centered philosophy" }
];

const team = [
  {
    name: "Dr. Sarah Mitchell",
    role: "Founder & Director",
    bio: "With over 20 years in early childhood education, Dr. Mitchell founded KIDazzle with a mission to create nurturing environments where every child can shine."
  },
  {
    name: "Michael Thompson",
    role: "Education Director",
    bio: "Michael oversees our curriculum development and ensures our programs meet the highest educational standards while remaining engaging and fun."
  },
  {
    name: "Lisa Chen",
    role: "Operations Director",
    bio: "Lisa ensures our facilities run smoothly and safely, maintaining the welcoming environment families love."
  }
];

const About = () => {
  return (
    <Layout>
      {/* Hero Section */}
      <section className="bg-gradient-soft py-16 md:py-24">
        <div className="container-site">
          <div className="max-w-3xl mx-auto text-center">
            <div className="inline-flex items-center gap-2 bg-primary/10 text-primary px-4 py-2 rounded-full text-sm font-medium mb-6">
              <Heart className="h-4 w-4" />
              Our Story
            </div>
            <h1 className="text-4xl md:text-5xl font-bold mb-6">
              Building Bright Futures{" "}
              <span className="text-primary">Since 2008</span>
            </h1>
            <p className="text-lg text-muted-foreground">
              At KIDazzle Academy, we believe every child is unique and capable of amazing things. 
              Our mission is to nurture that potential through exceptional care and innovative education.
            </p>
          </div>
        </div>
      </section>

      {/* Mission Section */}
      <section className="section-padding">
        <div className="container-site">
          <div className="grid lg:grid-cols-2 gap-12 items-center">
            <div>
              <h2 className="text-3xl md:text-4xl font-bold mb-6">
                Our <span className="text-secondary">Mission</span>
              </h2>
              <p className="text-lg text-muted-foreground mb-6">
                To provide exceptional early childhood education that nurtures the whole child—intellectually, 
                socially, emotionally, and physically—while partnering with families to create a strong 
                foundation for lifelong success.
              </p>
              <div className="space-y-4">
                {["Child-centered learning approach", "Research-based curriculum", "Highly qualified educators", "Safe and nurturing environment"].map((item, index) => (
                  <div key={index} className="flex items-center gap-3">
                    <CheckCircle2 className="h-5 w-5 text-primary flex-shrink-0" />
                    <span>{item}</span>
                  </div>
                ))}
              </div>
            </div>
            <div className="relative">
              <div className="aspect-square rounded-3xl bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center">
                <div className="text-center p-8">
                  <div className="text-8xl mb-4">🌟</div>
                  <p className="text-xl font-semibold text-foreground">Excellence in Care</p>
                </div>
              </div>
              <div className="absolute -bottom-6 -right-6 bg-card rounded-xl shadow-medium p-4">
                <div className="flex items-center gap-3">
                  <div className="flex">
                    {[...Array(5)].map((_, i) => (
                      <Star key={i} className="h-5 w-5 text-secondary fill-secondary" />
                    ))}
                  </div>
                  <span className="font-semibold">Quality Rated</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Values Section */}
      <section className="section-padding bg-muted/50">
        <div className="container-site">
          <div className="text-center max-w-2xl mx-auto mb-12">
            <h2 className="text-3xl md:text-4xl font-bold mb-4">
              Our Core <span className="text-primary">Values</span>
            </h2>
            <p className="text-muted-foreground">
              These principles guide everything we do at KIDazzle Academy.
            </p>
          </div>
          <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            {values.map((value, index) => (
              <div key={index} className="bg-card rounded-2xl p-6 shadow-soft hover:shadow-medium transition-shadow">
                <div className="p-3 bg-primary/10 rounded-xl w-fit mb-4">
                  <value.icon className="h-6 w-6 text-primary" />
                </div>
                <h3 className="text-xl font-semibold mb-2">{value.title}</h3>
                <p className="text-muted-foreground text-sm">{value.description}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Timeline Section */}
      <section className="section-padding">
        <div className="container-site">
          <div className="text-center max-w-2xl mx-auto mb-12">
            <h2 className="text-3xl md:text-4xl font-bold mb-4">
              Our <span className="text-secondary">Journey</span>
            </h2>
            <p className="text-muted-foreground">
              Key milestones in our mission to provide exceptional childcare.
            </p>
          </div>
          <div className="max-w-3xl mx-auto">
            {milestones.map((milestone, index) => (
              <div key={index} className="flex gap-6 mb-8 last:mb-0">
                <div className="flex flex-col items-center">
                  <div className="w-16 h-16 bg-gradient-primary rounded-full flex items-center justify-center text-primary-foreground font-bold">
                    {milestone.year}
                  </div>
                  {index < milestones.length - 1 && (
                    <div className="w-0.5 h-full bg-border mt-2" />
                  )}
                </div>
                <div className="pt-4">
                  <p className="text-foreground">{milestone.event}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Team Section */}
      <section className="section-padding bg-muted/50">
        <div className="container-site">
          <div className="text-center max-w-2xl mx-auto mb-12">
            <h2 className="text-3xl md:text-4xl font-bold mb-4">
              Meet Our <span className="text-primary">Leadership</span>
            </h2>
            <p className="text-muted-foreground">
              Dedicated professionals committed to your child's success.
            </p>
          </div>
          <div className="grid md:grid-cols-3 gap-8">
            {team.map((member, index) => (
              <div key={index} className="bg-card rounded-2xl p-6 text-center shadow-soft">
                <div className="w-24 h-24 bg-gradient-to-br from-primary to-secondary rounded-full mx-auto mb-4 flex items-center justify-center text-4xl text-primary-foreground">
                  {member.name.charAt(0)}
                </div>
                <h3 className="text-xl font-semibold mb-1">{member.name}</h3>
                <p className="text-primary text-sm font-medium mb-3">{member.role}</p>
                <p className="text-muted-foreground text-sm">{member.bio}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="section-padding bg-gradient-primary text-primary-foreground">
        <div className="container-site text-center">
          <h2 className="text-3xl md:text-4xl font-bold mb-4">
            Ready to Join Our Family?
          </h2>
          <p className="text-lg opacity-90 mb-8 max-w-2xl mx-auto">
            Schedule a tour today and see why families trust KIDazzle Academy 
            for their children's early education.
          </p>
          <Button asChild size="lg" className="bg-secondary hover:bg-secondary/90 text-secondary-foreground rounded-full px-8">
            <Link to="/contact">
              Book a Tour
              <ArrowRight className="ml-2 h-5 w-5" />
            </Link>
          </Button>
        </div>
      </section>
    </Layout>
  );
};

export default About;
