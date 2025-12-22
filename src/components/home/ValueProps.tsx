import { Heart, BookOpen, Shield, Users } from "lucide-react";

const values = [
  {
    icon: Heart,
    title: "Nurturing Care",
    description: "Every child receives individual attention in a warm, loving environment that feels like a second home.",
  },
  {
    icon: BookOpen,
    title: "Play-Based Learning",
    description: "Our curriculum blends structured learning with creative play, fostering curiosity and a love for discovery.",
  },
  {
    icon: Shield,
    title: "Safe & Secure",
    description: "State-of-the-art security systems and trained staff ensure your child's safety is always our top priority.",
  },
  {
    icon: Users,
    title: "Expert Teachers",
    description: "Our educators are certified professionals passionate about early childhood development and education.",
  },
];

const ValueProps = () => {
  return (
    <section className="section-padding bg-background">
      <div className="container-site">
        {/* Section Header */}
        <div className="text-center max-w-2xl mx-auto mb-16">
          <span className="text-secondary font-semibold text-sm uppercase tracking-wider">
            Why Choose Us
          </span>
          <h2 className="text-3xl md:text-4xl font-bold mt-3 mb-4">
            The KIDazzle Difference
          </h2>
          <p className="text-muted-foreground text-lg">
            We believe every child deserves an exceptional start. Here's what sets us apart.
          </p>
        </div>

        {/* Values Grid */}
        <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
          {values.map((value, index) => (
            <div
              key={value.title}
              className="group relative bg-card rounded-2xl p-8 shadow-soft hover:shadow-medium transition-all duration-300 hover:-translate-y-1"
              style={{ animationDelay: `${index * 0.1}s` }}
            >
              {/* Icon */}
              <div className="mb-6">
                <div className="inline-flex items-center justify-center w-14 h-14 rounded-xl bg-gradient-to-br from-primary to-primary-light text-primary-foreground group-hover:scale-110 transition-transform duration-300">
                  <value.icon className="h-7 w-7" />
                </div>
              </div>

              {/* Content */}
              <h3 className="text-xl font-semibold mb-3">{value.title}</h3>
              <p className="text-muted-foreground leading-relaxed">
                {value.description}
              </p>

              {/* Decorative Accent */}
              <div className="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-primary to-secondary rounded-b-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300" />
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default ValueProps;