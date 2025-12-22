import Layout from "@/components/layout/Layout";
import { Button } from "@/components/ui/button";
import { Link } from "react-router-dom";
import { 
  BookOpen, 
  Download, 
  FileText, 
  Calendar, 
  Users, 
  ArrowRight, 
  ExternalLink,
  Video,
  MessageSquare,
  Heart
} from "lucide-react";

const parentResources = [
  {
    icon: FileText,
    title: "Parent Handbook",
    description: "Everything you need to know about our policies, procedures, and programs.",
    action: "Download PDF",
    type: "download"
  },
  {
    icon: Calendar,
    title: "Academic Calendar",
    description: "Important dates including holidays, events, and professional development days.",
    action: "View Calendar",
    type: "link"
  },
  {
    icon: Video,
    title: "Parent Portal",
    description: "Access your child's daily reports, photos, and communicate with teachers.",
    action: "Login to Portal",
    type: "external"
  },
  {
    icon: MessageSquare,
    title: "Newsletter Archive",
    description: "Stay up to date with monthly newsletters and classroom updates.",
    action: "View Newsletters",
    type: "link"
  }
];

const developmentResources = [
  {
    title: "Ages 0-12 Months",
    description: "Understanding infant development milestones and how to support your baby's growth.",
    topics: ["Tummy time activities", "Language development", "Sleep patterns", "Feeding transitions"]
  },
  {
    title: "Ages 1-2 Years",
    description: "Navigating the toddler years with confidence and understanding.",
    topics: ["Walking and motor skills", "First words and language", "Potty training readiness", "Emotional regulation"]
  },
  {
    title: "Ages 3-4 Years",
    description: "Preparing your preschooler for academic and social success.",
    topics: ["Pre-literacy skills", "Socialization", "Creative expression", "Independence building"]
  },
  {
    title: "Ages 4-5 Years",
    description: "Kindergarten readiness and preparing for the big transition.",
    topics: ["Academic readiness", "Self-help skills", "Following directions", "Peer relationships"]
  }
];

const upcomingEvents = [
  {
    date: "Jan 15",
    title: "Open House - West End",
    time: "10:00 AM - 12:00 PM"
  },
  {
    date: "Jan 22",
    title: "Parent Workshop: Positive Discipline",
    time: "6:30 PM - 8:00 PM"
  },
  {
    date: "Feb 5",
    title: "Valentine's Day Celebration",
    time: "All Day"
  },
  {
    date: "Feb 14",
    title: "Parent-Teacher Conferences",
    time: "By Appointment"
  }
];

const Resources = () => {
  return (
    <Layout>
      {/* Hero Section */}
      <section className="bg-gradient-soft py-16 md:py-24">
        <div className="container-site">
          <div className="max-w-3xl mx-auto text-center">
            <div className="inline-flex items-center gap-2 bg-primary/10 text-primary px-4 py-2 rounded-full text-sm font-medium mb-6">
              <BookOpen className="h-4 w-4" />
              Parent Resources
            </div>
            <h1 className="text-4xl md:text-5xl font-bold mb-6">
              Tools & Resources for{" "}
              <span className="text-primary">Family</span>{" "}
              <span className="text-secondary">Success</span>
            </h1>
            <p className="text-lg text-muted-foreground">
              Access helpful resources, stay connected with our community, and support your child's development at home.
            </p>
          </div>
        </div>
      </section>

      {/* Quick Links */}
      <section className="section-padding">
        <div className="container-site">
          <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            {parentResources.map((resource, index) => (
              <div key={index} className="bg-card rounded-2xl p-6 shadow-soft hover:shadow-medium transition-all group">
                <div className="p-3 bg-primary/10 rounded-xl w-fit mb-4 group-hover:bg-primary/20 transition-colors">
                  <resource.icon className="h-6 w-6 text-primary" />
                </div>
                <h3 className="text-lg font-semibold mb-2">{resource.title}</h3>
                <p className="text-sm text-muted-foreground mb-4">{resource.description}</p>
                <Button variant="ghost" className="p-0 h-auto text-primary hover:text-primary/80">
                  {resource.action}
                  {resource.type === "external" ? (
                    <ExternalLink className="ml-2 h-4 w-4" />
                  ) : resource.type === "download" ? (
                    <Download className="ml-2 h-4 w-4" />
                  ) : (
                    <ArrowRight className="ml-2 h-4 w-4" />
                  )}
                </Button>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Developmental Resources */}
      <section className="section-padding bg-muted/50">
        <div className="container-site">
          <div className="text-center max-w-2xl mx-auto mb-12">
            <h2 className="text-3xl md:text-4xl font-bold mb-4">
              <span className="text-secondary">Development</span> by Age
            </h2>
            <p className="text-muted-foreground">
              Helpful information and activities to support your child's growth at each stage.
            </p>
          </div>
          <div className="grid md:grid-cols-2 gap-6">
            {developmentResources.map((resource, index) => (
              <div key={index} className="bg-card rounded-2xl p-6 shadow-soft">
                <h3 className="text-xl font-bold mb-2">{resource.title}</h3>
                <p className="text-muted-foreground mb-4">{resource.description}</p>
                <div className="grid grid-cols-2 gap-2">
                  {resource.topics.map((topic, i) => (
                    <div key={i} className="flex items-center gap-2 text-sm">
                      <div className="w-1.5 h-1.5 bg-primary rounded-full" />
                      <span>{topic}</span>
                    </div>
                  ))}
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Upcoming Events */}
      <section className="section-padding">
        <div className="container-site">
          <div className="grid lg:grid-cols-2 gap-12 items-center">
            <div>
              <h2 className="text-3xl md:text-4xl font-bold mb-4">
                Upcoming <span className="text-primary">Events</span>
              </h2>
              <p className="text-muted-foreground mb-6">
                Join us for community events, workshops, and celebrations throughout the year.
              </p>
              <div className="space-y-4">
                {upcomingEvents.map((event, index) => (
                  <div key={index} className="flex gap-4 p-4 bg-muted/50 rounded-xl">
                    <div className="bg-primary text-primary-foreground rounded-lg p-3 text-center min-w-[70px]">
                      <p className="text-xs uppercase">2025</p>
                      <p className="font-bold">{event.date}</p>
                    </div>
                    <div>
                      <h4 className="font-semibold">{event.title}</h4>
                      <p className="text-sm text-muted-foreground">{event.time}</p>
                    </div>
                  </div>
                ))}
              </div>
            </div>
            <div className="bg-gradient-to-br from-primary/10 to-secondary/10 rounded-3xl p-8 text-center">
              <div className="text-6xl mb-4">📅</div>
              <h3 className="text-2xl font-bold mb-4">Stay Connected</h3>
              <p className="text-muted-foreground mb-6">
                Get updates on events, activities, and important announcements delivered to your inbox.
              </p>
              <Button className="btn-secondary rounded-full px-6">
                Subscribe to Newsletter
                <ArrowRight className="ml-2 h-4 w-4" />
              </Button>
            </div>
          </div>
        </div>
      </section>

      {/* Community Section */}
      <section className="section-padding bg-muted/50">
        <div className="container-site">
          <div className="text-center max-w-2xl mx-auto mb-12">
            <h2 className="text-3xl md:text-4xl font-bold mb-4">
              Join Our <span className="text-secondary">Community</span>
            </h2>
            <p className="text-muted-foreground">
              Connect with other KIDazzle families and stay engaged with your child's education.
            </p>
          </div>
          <div className="grid md:grid-cols-3 gap-6">
            <div className="bg-card rounded-2xl p-6 text-center shadow-soft">
              <div className="p-4 bg-blue-500/10 rounded-full w-fit mx-auto mb-4">
                <Users className="h-8 w-8 text-blue-500" />
              </div>
              <h3 className="text-lg font-semibold mb-2">Parent Facebook Group</h3>
              <p className="text-sm text-muted-foreground mb-4">
                Connect with other families, share experiences, and build community.
              </p>
              <Button variant="outline" className="rounded-full">
                Join Group
                <ExternalLink className="ml-2 h-4 w-4" />
              </Button>
            </div>
            <div className="bg-card rounded-2xl p-6 text-center shadow-soft">
              <div className="p-4 bg-pink-500/10 rounded-full w-fit mx-auto mb-4">
                <Heart className="h-8 w-8 text-pink-500" />
              </div>
              <h3 className="text-lg font-semibold mb-2">Volunteer Opportunities</h3>
              <p className="text-sm text-muted-foreground mb-4">
                Get involved in classroom activities, field trips, and special events.
              </p>
              <Button variant="outline" className="rounded-full">
                Learn More
                <ArrowRight className="ml-2 h-4 w-4" />
              </Button>
            </div>
            <div className="bg-card rounded-2xl p-6 text-center shadow-soft">
              <div className="p-4 bg-green-500/10 rounded-full w-fit mx-auto mb-4">
                <MessageSquare className="h-8 w-8 text-green-500" />
              </div>
              <h3 className="text-lg font-semibold mb-2">Parent Advisory Council</h3>
              <p className="text-sm text-muted-foreground mb-4">
                Help shape the future of KIDazzle by joining our parent leadership group.
              </p>
              <Button variant="outline" className="rounded-full">
                Apply Now
                <ArrowRight className="ml-2 h-4 w-4" />
              </Button>
            </div>
          </div>
        </div>
      </section>

      {/* CTA */}
      <section className="section-padding bg-gradient-primary text-primary-foreground">
        <div className="container-site text-center">
          <h2 className="text-3xl md:text-4xl font-bold mb-4">
            Questions? We're Here to Help
          </h2>
          <p className="text-lg opacity-90 mb-8 max-w-2xl mx-auto">
            Can't find what you're looking for? Our team is happy to assist you.
          </p>
          <Button asChild size="lg" className="bg-secondary hover:bg-secondary/90 text-secondary-foreground rounded-full px-8">
            <Link to="/contact">
              Contact Us
              <ArrowRight className="ml-2 h-5 w-5" />
            </Link>
          </Button>
        </div>
      </section>
    </Layout>
  );
};

export default Resources;
