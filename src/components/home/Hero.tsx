import { Link } from "react-router-dom";
import { Button } from "@/components/ui/button";
import { ArrowRight, Star, Users, Shield } from "lucide-react";

const Hero = () => {
  return (
    <section className="relative overflow-hidden bg-gradient-soft">
      {/* Background Pattern */}
      <div className="absolute inset-0 opacity-[0.03]">
        <div className="absolute top-20 left-10 w-72 h-72 bg-primary rounded-full blur-3xl" />
        <div className="absolute bottom-20 right-10 w-96 h-96 bg-secondary rounded-full blur-3xl" />
      </div>

      <div className="container-site relative">
        <div className="grid lg:grid-cols-2 gap-12 items-center py-16 md:py-24">
          {/* Content */}
          <div className="space-y-8">
            {/* Enrollment Badge */}
            <div className="inline-flex items-center gap-2 bg-secondary/20 text-secondary-foreground px-4 py-2 rounded-full text-sm font-medium animate-fade-in">
              <span className="w-2 h-2 bg-secondary rounded-full animate-pulse" />
              Now Enrolling All Ages!
            </div>

            <h1 className="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight animate-slide-up">
              Where Every Child's{" "}
              <span className="text-primary">Potential</span>{" "}
              <span className="text-secondary">Shines</span>
            </h1>

            <p className="text-lg md:text-xl text-muted-foreground max-w-lg animate-slide-up" style={{ animationDelay: "0.1s" }}>
              Exceptional early childhood education with nurturing environments 
              where children thrive, learn, and grow into confident individuals.
            </p>

            {/* CTA Buttons */}
            <div className="flex flex-col sm:flex-row gap-4 animate-slide-up" style={{ animationDelay: "0.2s" }}>
              <Button asChild size="lg" className="btn-secondary rounded-full text-base px-8 shadow-glow">
                <Link to="/contact">
                  Book a Tour
                  <ArrowRight className="ml-2 h-5 w-5" />
                </Link>
              </Button>
              <Button asChild variant="outline" size="lg" className="rounded-full text-base px-8">
                <Link to="/programs">Explore Programs</Link>
              </Button>
            </div>

            {/* Trust Indicators */}
            <div className="flex flex-wrap gap-6 pt-4 animate-fade-in" style={{ animationDelay: "0.3s" }}>
              <div className="flex items-center gap-2 text-sm text-muted-foreground">
                <div className="p-2 bg-primary/10 rounded-full">
                  <Star className="h-4 w-4 text-primary" />
                </div>
                <span>Quality Rated</span>
              </div>
              <div className="flex items-center gap-2 text-sm text-muted-foreground">
                <div className="p-2 bg-primary/10 rounded-full">
                  <Users className="h-4 w-4 text-primary" />
                </div>
                <span>15+ Years Experience</span>
              </div>
              <div className="flex items-center gap-2 text-sm text-muted-foreground">
                <div className="p-2 bg-primary/10 rounded-full">
                  <Shield className="h-4 w-4 text-primary" />
                </div>
                <span>NAEYC Accredited</span>
              </div>
            </div>
          </div>

          {/* Hero Image/Visual */}
          <div className="relative animate-scale-in">
            <div className="relative bg-gradient-to-br from-primary/10 to-secondary/10 rounded-3xl p-8 lg:p-12">
              {/* Decorative Elements */}
              <div className="absolute -top-4 -right-4 w-24 h-24 bg-secondary rounded-full opacity-20 animate-float" />
              <div className="absolute -bottom-6 -left-6 w-32 h-32 bg-primary rounded-full opacity-10 animate-float" style={{ animationDelay: "1s" }} />
              
              {/* Placeholder for Hero Image */}
              <div className="aspect-[4/3] rounded-2xl bg-gradient-to-br from-primary to-primary-light flex items-center justify-center overflow-hidden">
                <div className="text-center text-primary-foreground p-8">
                  <div className="text-6xl mb-4">🎨</div>
                  <p className="text-xl font-semibold">Happy Learning</p>
                  <p className="text-sm opacity-80">Every Day</p>
                </div>
              </div>

              {/* Floating Stats Card */}
              <div className="absolute -bottom-4 -left-4 bg-card rounded-xl shadow-medium p-4 animate-float" style={{ animationDelay: "0.5s" }}>
                <div className="flex items-center gap-3">
                  <div className="p-2 bg-secondary/20 rounded-lg">
                    <Users className="h-6 w-6 text-secondary" />
                  </div>
                  <div>
                    <p className="text-2xl font-bold text-foreground">2,500+</p>
                    <p className="text-sm text-muted-foreground">Families Served</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Hero;