import Layout from "@/components/layout/Layout";
import { Button } from "@/components/ui/button";
import { Link } from "react-router-dom";
import { MapPin, Phone, Clock, ArrowRight, Star, CheckCircle2 } from "lucide-react";

const locations = [
  {
    id: "west-end",
    name: "West End",
    address: "1234 West End Ave, Suite 100",
    city: "Atlanta, GA 30318",
    phone: "(404) 555-0100",
    hours: "Monday - Friday: 6:30 AM - 6:30 PM",
    programs: ["Infant Care", "Toddlers", "Preschool", "Pre-K"],
    features: ["Outdoor playground", "Parent parking", "Security system", "Modern classrooms"],
    rating: 4.9,
    reviews: 127
  },
  {
    id: "midtown",
    name: "Midtown",
    address: "567 Peachtree St NE",
    city: "Atlanta, GA 30308",
    phone: "(404) 555-0200",
    hours: "Monday - Friday: 6:30 AM - 6:30 PM",
    programs: ["Infant Care", "Toddlers", "Preschool", "Pre-K", "School Age"],
    features: ["Indoor gym", "Garden area", "Covered parking", "Art studio"],
    rating: 4.8,
    reviews: 98
  },
  {
    id: "buckhead",
    name: "Buckhead",
    address: "890 Lenox Road NE",
    city: "Atlanta, GA 30326",
    phone: "(404) 555-0300",
    hours: "Monday - Friday: 6:30 AM - 6:30 PM",
    programs: ["Toddlers", "Preschool", "Pre-K", "School Age"],
    features: ["Large outdoor space", "STEM lab", "Music room", "Parent lounge"],
    rating: 4.9,
    reviews: 145
  }
];

const Locations = () => {
  return (
    <Layout>
      {/* Hero Section */}
      <section className="bg-gradient-soft py-16 md:py-24">
        <div className="container-site">
          <div className="max-w-3xl mx-auto text-center">
            <div className="inline-flex items-center gap-2 bg-primary/10 text-primary px-4 py-2 rounded-full text-sm font-medium mb-6">
              <MapPin className="h-4 w-4" />
              Convenient Locations
            </div>
            <h1 className="text-4xl md:text-5xl font-bold mb-6">
              Find a <span className="text-primary">KIDazzle</span>{" "}
              <span className="text-secondary">Near You</span>
            </h1>
            <p className="text-lg text-muted-foreground">
              Multiple convenient locations throughout Atlanta, each offering 
              the same exceptional care and education your family deserves.
            </p>
          </div>
        </div>
      </section>

      {/* Locations Grid */}
      <section className="section-padding">
        <div className="container-site">
          <div className="grid lg:grid-cols-2 xl:grid-cols-3 gap-8">
            {locations.map((location) => (
              <div key={location.id} className="bg-card rounded-2xl overflow-hidden shadow-soft hover:shadow-medium transition-shadow">
                {/* Map Placeholder */}
                <div className="aspect-video bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
                  <div className="text-center">
                    <MapPin className="h-12 w-12 text-primary mx-auto mb-2" />
                    <p className="font-semibold text-foreground">{location.name}</p>
                  </div>
                </div>
                
                <div className="p-6">
                  <div className="flex items-center justify-between mb-4">
                    <h2 className="text-2xl font-bold">{location.name}</h2>
                    <div className="flex items-center gap-1 text-sm">
                      <Star className="h-4 w-4 text-secondary fill-secondary" />
                      <span className="font-semibold">{location.rating}</span>
                      <span className="text-muted-foreground">({location.reviews})</span>
                    </div>
                  </div>

                  <div className="space-y-3 mb-6">
                    <div className="flex items-start gap-3">
                      <MapPin className="h-5 w-5 text-primary flex-shrink-0 mt-0.5" />
                      <div>
                        <p className="text-sm">{location.address}</p>
                        <p className="text-sm text-muted-foreground">{location.city}</p>
                      </div>
                    </div>
                    <div className="flex items-center gap-3">
                      <Phone className="h-5 w-5 text-primary flex-shrink-0" />
                      <a href={`tel:${location.phone}`} className="text-sm hover:text-primary transition-colors">
                        {location.phone}
                      </a>
                    </div>
                    <div className="flex items-center gap-3">
                      <Clock className="h-5 w-5 text-primary flex-shrink-0" />
                      <p className="text-sm text-muted-foreground">{location.hours}</p>
                    </div>
                  </div>

                  {/* Programs */}
                  <div className="mb-6">
                    <p className="text-sm font-medium mb-2">Programs Available:</p>
                    <div className="flex flex-wrap gap-2">
                      {location.programs.map((program) => (
                        <span key={program} className="text-xs bg-primary/10 text-primary px-2 py-1 rounded-full">
                          {program}
                        </span>
                      ))}
                    </div>
                  </div>

                  {/* Features */}
                  <div className="mb-6">
                    <p className="text-sm font-medium mb-2">Features:</p>
                    <div className="grid grid-cols-2 gap-2">
                      {location.features.map((feature) => (
                        <div key={feature} className="flex items-center gap-2 text-xs text-muted-foreground">
                          <CheckCircle2 className="h-3 w-3 text-primary" />
                          {feature}
                        </div>
                      ))}
                    </div>
                  </div>

                  <div className="flex gap-3">
                    <Button asChild className="flex-1 btn-primary rounded-full">
                      <Link to="/contact">Book a Tour</Link>
                    </Button>
                    <Button asChild variant="outline" className="rounded-full">
                      <a href={`tel:${location.phone}`}>Call</a>
                    </Button>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Info Section */}
      <section className="section-padding bg-muted/50">
        <div className="container-site">
          <div className="grid md:grid-cols-3 gap-8 text-center">
            <div>
              <div className="text-4xl font-bold text-primary mb-2">3</div>
              <p className="text-muted-foreground">Convenient Locations</p>
            </div>
            <div>
              <div className="text-4xl font-bold text-secondary mb-2">500+</div>
              <p className="text-muted-foreground">Enrolled Families</p>
            </div>
            <div>
              <div className="text-4xl font-bold text-primary mb-2">15+</div>
              <p className="text-muted-foreground">Years Serving Atlanta</p>
            </div>
          </div>
        </div>
      </section>

      {/* CTA */}
      <section className="section-padding bg-gradient-primary text-primary-foreground">
        <div className="container-site text-center">
          <h2 className="text-3xl md:text-4xl font-bold mb-4">
            Visit Us Today
          </h2>
          <p className="text-lg opacity-90 mb-8 max-w-2xl mx-auto">
            Schedule a tour at any of our locations and experience the KIDazzle difference.
          </p>
          <Button asChild size="lg" className="bg-secondary hover:bg-secondary/90 text-secondary-foreground rounded-full px-8">
            <Link to="/contact">
              Schedule a Tour
              <ArrowRight className="ml-2 h-5 w-5" />
            </Link>
          </Button>
        </div>
      </section>
    </Layout>
  );
};

export default Locations;
