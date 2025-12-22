import Layout from "@/components/layout/Layout";
import { Button } from "@/components/ui/button";
import { Link } from "react-router-dom";
import { ArrowRight, CheckCircle2, Clock, Users, BookOpen, Star } from "lucide-react";

const programs = [
  {
    slug: "infant",
    title: "Infant Care",
    ages: "6 Weeks - 12 Months",
    description: "A nurturing environment where your baby receives individualized care and attention, laying the foundation for healthy development.",
    features: [
      "Low caregiver-to-child ratios (1:4)",
      "Personalized feeding and sleep schedules",
      "Tummy time and sensory exploration",
      "Daily communication with parents",
      "Safe, clean, and stimulating environment"
    ],
    schedule: "Full-time: 6:30 AM - 6:30 PM",
    color: "from-pink-500 to-rose-400"
  },
  {
    slug: "toddler",
    title: "Toddler Program",
    ages: "1 - 2 Years",
    description: "Supporting your curious explorer as they discover the world through play-based learning and social interaction.",
    features: [
      "Small group sizes (1:5 ratio)",
      "Language development activities",
      "Creative arts and music",
      "Outdoor play and gross motor skills",
      "Potty training support"
    ],
    schedule: "Full-time: 6:30 AM - 6:30 PM",
    color: "from-orange-500 to-amber-400"
  },
  {
    slug: "preschool",
    title: "Preschool",
    ages: "3 - 4 Years",
    description: "Building confidence and essential skills through our engaging, research-based curriculum designed for early learners.",
    features: [
      "Pre-reading and early literacy",
      "Math concepts and problem-solving",
      "Science exploration and discovery",
      "Social-emotional development",
      "Creative expression through art"
    ],
    schedule: "Full-time: 6:30 AM - 6:30 PM",
    color: "from-blue-500 to-cyan-400"
  },
  {
    slug: "prek",
    title: "Pre-Kindergarten",
    ages: "4 - 5 Years",
    description: "Preparing your child for kindergarten success with comprehensive academic and social readiness programs.",
    features: [
      "Kindergarten readiness curriculum",
      "Reading and writing foundations",
      "Advanced math concepts",
      "Critical thinking skills",
      "Leadership and collaboration"
    ],
    schedule: "Full-time: 6:30 AM - 6:30 PM",
    color: "from-indigo-500 to-violet-400"
  },
  {
    slug: "school-age",
    title: "School Age",
    ages: "5 - 12 Years",
    description: "Before and after school care that supports academic success while providing enriching activities and homework help.",
    features: [
      "Homework assistance",
      "STEM and enrichment activities",
      "Physical fitness and sports",
      "Arts and creative projects",
      "Safe transportation options"
    ],
    schedule: "Before: 6:30 AM - 8:00 AM | After: 3:00 PM - 6:30 PM",
    color: "from-green-500 to-emerald-400"
  }
];

const curriculum = [
  {
    icon: BookOpen,
    title: "Literacy & Language",
    description: "Building strong foundations in reading, writing, and communication."
  },
  {
    icon: Star,
    title: "Math & Science",
    description: "Hands-on exploration of numbers, patterns, and the natural world."
  },
  {
    icon: Users,
    title: "Social Skills",
    description: "Developing empathy, cooperation, and positive relationships."
  }
];

const Programs = () => {
  return (
    <Layout>
      {/* Hero Section */}
      <section className="bg-gradient-soft py-16 md:py-24">
        <div className="container-site">
          <div className="max-w-3xl mx-auto text-center">
            <div className="inline-flex items-center gap-2 bg-secondary/20 text-secondary-foreground px-4 py-2 rounded-full text-sm font-medium mb-6">
              <BookOpen className="h-4 w-4" />
              Age-Appropriate Programs
            </div>
            <h1 className="text-4xl md:text-5xl font-bold mb-6">
              Programs Designed for{" "}
              <span className="text-primary">Every Stage</span>
            </h1>
            <p className="text-lg text-muted-foreground">
              From infants to school-age children, we offer comprehensive programs 
              that nurture development at every age.
            </p>
          </div>
        </div>
      </section>

      {/* Programs Grid */}
      <section className="section-padding">
        <div className="container-site">
          <div className="space-y-12">
            {programs.map((program, index) => (
              <div 
                key={program.slug} 
                className={`grid lg:grid-cols-2 gap-8 items-center ${index % 2 === 1 ? 'lg:flex-row-reverse' : ''}`}
              >
                <div className={index % 2 === 1 ? 'lg:order-2' : ''}>
                  <div className={`aspect-[4/3] rounded-3xl bg-gradient-to-br ${program.color} flex items-center justify-center`}>
                    <div className="text-center text-white p-8">
                      <div className="text-6xl mb-4">
                        {program.slug === 'infant' && '👶'}
                        {program.slug === 'toddler' && '🧒'}
                        {program.slug === 'preschool' && '🎨'}
                        {program.slug === 'prek' && '📚'}
                        {program.slug === 'school-age' && '🎒'}
                      </div>
                      <p className="text-xl font-semibold">{program.ages}</p>
                    </div>
                  </div>
                </div>
                <div className={index % 2 === 1 ? 'lg:order-1' : ''}>
                  <h2 className="text-3xl font-bold mb-2">{program.title}</h2>
                  <p className="text-primary font-medium mb-4">{program.ages}</p>
                  <p className="text-muted-foreground mb-6">{program.description}</p>
                  
                  <div className="space-y-3 mb-6">
                    {program.features.map((feature, i) => (
                      <div key={i} className="flex items-start gap-3">
                        <CheckCircle2 className="h-5 w-5 text-primary flex-shrink-0 mt-0.5" />
                        <span className="text-sm">{feature}</span>
                      </div>
                    ))}
                  </div>

                  <div className="flex items-center gap-2 text-sm text-muted-foreground mb-6">
                    <Clock className="h-4 w-4" />
                    <span>{program.schedule}</span>
                  </div>

                  <Button asChild className="btn-primary rounded-full">
                    <Link to="/contact">
                      Enroll Now
                      <ArrowRight className="ml-2 h-4 w-4" />
                    </Link>
                  </Button>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Curriculum Overview */}
      <section className="section-padding bg-muted/50">
        <div className="container-site">
          <div className="text-center max-w-2xl mx-auto mb-12">
            <h2 className="text-3xl md:text-4xl font-bold mb-4">
              Our <span className="text-secondary">Curriculum</span>
            </h2>
            <p className="text-muted-foreground">
              Research-based learning that prepares children for academic and life success.
            </p>
          </div>
          <div className="grid md:grid-cols-3 gap-8">
            {curriculum.map((item, index) => (
              <div key={index} className="bg-card rounded-2xl p-8 text-center shadow-soft">
                <div className="p-4 bg-primary/10 rounded-full w-fit mx-auto mb-4">
                  <item.icon className="h-8 w-8 text-primary" />
                </div>
                <h3 className="text-xl font-semibold mb-2">{item.title}</h3>
                <p className="text-muted-foreground">{item.description}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* CTA */}
      <section className="section-padding bg-gradient-primary text-primary-foreground">
        <div className="container-site text-center">
          <h2 className="text-3xl md:text-4xl font-bold mb-4">
            Find the Perfect Program for Your Child
          </h2>
          <p className="text-lg opacity-90 mb-8 max-w-2xl mx-auto">
            Schedule a tour to see our programs in action and meet our caring team.
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

export default Programs;
